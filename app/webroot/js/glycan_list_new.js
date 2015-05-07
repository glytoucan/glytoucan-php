$(function () { // wrapper function

  var ITEM_PER_PAGE = 20;

  var KEY_DOWN = 40;
  var KEY_UP = 38;
  var KEY_ENTER = 13;

  Number.isNaN = Number.isNaN || function (any) {
    return typeof any === 'number' && isNaN(any);
  }; //IE10 hack.

////////////////////////////////////////

//helper functions
  var util = {

    get_params: function () {
      var vars = {};
      var param = location.search.substring(1).split('&');
      var i, keySearch, key, val;
      for (i = 0; i < param.length; i += 1) {
        keySearch = param[i].search(/\=/);
        key = '';
        if (keySearch !== -1) {
          key = param[i].slice(0, keySearch);
        }
        val = param[i].slice(param[i].indexOf('=', 0) + 1);
        if (key !== '') {
          vars[key] = decodeURI(val);
        }
      }
      return vars;
    },

    get_id: function () {
      var params = location.href.split('/');
      return params.pop();
    },

    ajax_get: function (stanza_name, obj) {
      var defer = $.Deferred();
      var stanza_url = STANZA_URL;
      var params = '';
      var key = '';
      for (key in obj) {
        params += ('&' + key + '=' + obj[key]);
      }
      $.ajax({
        type: 'GET',
        //url: stanza_url + stanza_name + "?" + params,
        url: '/connect.php',
        data: {
          url: stanza_url + stanza_name + "?" + params
        },
        cache: false,
        timeout: 60000,
        datatype: 'text'
      }).then(function (data) {
        defer.resolve(data);
      }, function () {
        defer.reject('Ajax request failed.');
      });
      return defer.promise();
    },

    set_pager: function (page, total) {
      if (total === 0) {
        return;
      }
      var pager_tags = '';
      var per_page = ITEM_PER_PAGE;
      var last_page = parseInt(((total - 1) / per_page), 10) + 1;
      if (page > 1) {
        pager_tags += ('<li class="glResultPager_prev" data-gopage="' + (page - 1) + '">&lt;</li>');
      }
      if (page > 2) {
        pager_tags += ('<li class="glResultPager_num glResultPager_num" data-gopage="1">1</li>');
      }
      if (page > 3) {
        pager_tags += ('<li class="glResultPager_ellipsis">&hellip;</li>');
      }
      if (page > 1) {
        pager_tags += ('<li class="glResultPager_num glResultPager_num" data-gopage="' + (page - 1) + '">' + (page - 1) + '</li>');
      }
      pager_tags += ('<li class="glResultPager_num glResultPager_num--current">' + page + '</li>');
      if ((last_page - page) > 0) {
        pager_tags += ('<li class="glResultPager_num glResultPager_num" data-gopage="' + (page + 1) + '">' + (page + 1) + '</li>');
      }
      if ((last_page - page) > 2) {
        pager_tags += ('<li class="glResultPager_ellipsis">&hellip;</li>');
      }
      if ((last_page - page) > 1) {
        pager_tags += ('<li class="glResultPager_num glResultPager_num" data-gopage="' + last_page + '">' + last_page + '</li>');
      }
      if ((last_page - page) > 0) {
        pager_tags += ('<li class="glResultPager_next" data-gopage="' + (page + 1) + '">&gt;</li>');
      }
      return pager_tags;
    },

    zoomImg: function (e) {
      var $target = $(e.currentTarget);
      if ($target.hasClass('js_noImg_box')) {
        return;
      }
      var box_size = $target.height();
      var img_size = $target.children('.js_zoomImg').width();
      var zoom_size = $target.children('.js_zoomImg').get(0).naturalWidth;
      if (parseInt(zoom_size, 10) > parseInt(img_size, 10)) {
        $target.children('.js_zoomImg').addClass('zoomImg--zoom');
        $target.height(box_size);
      }
    },

    zoomOutImg: function (e) {
      var $target = $(e.currentTarget);
      if ($target.hasClass('js_noImg_box')) {
        return;
      }
      $target.children('.js_zoomImg').removeClass('zoomImg--zoom');
    }

  }; //util END.

////////////////////////////////////////

//glycan list page
  var listApp = {

    init: function () {
      this.cacheElements();
      this.bindEvents();
      this.prev_word = '';
      this.current_items = {motif: [], monosaccharide: []};
      this.current_conditions = {motif: [], monosaccharide: {}};
      this.mass_values = {min: -1, max: -1};
      this.mass_range = {min: 0, max: 0};
      this.language = this.$app.data('lang') || '1';
      this.setFromParam();
      this.$listBox.draggable();
      this.notation = this.$app.data('notation') || 'cfg';
      this.showSuggest = false;
    },

    cacheElements: function () {
      this.$app = $('#glycan_list_app');
      this.$searchArea = $('.js_searchInput');
      this.$searchInput = this.$app.find('.js_incSearchQuery');
      this.$suggestList = this.$app.find('.js_searchSuggest');
      this.$adoptedArea = this.$app.find('.js_incSearchList');
      this.$massSlider = this.$app.find('.ju_Range-massRange');
      this.$massMin = this.$app.find('.ju_Range-massRange-min');
      this.$massMax = this.$app.find('.ju_Range-massRange-max');
      this.$allCelar = this.$app.find('.js_clear_condition');
      this.$totalNum = this.$app.find('.js_resultTotal_num');
      this.$viewSwitch = this.$app.find('.js_resultSwitch');
      this.$sortKey = this.$app.find('.js_list_sortkey');
      this.$sortDirec = this.$app.find('.js_list_sortdirec');
      this.$pager = this.$app.find('.js_mainPager');
      this.$resultNothing = this.$app.find('.glSearchNothing');
      this.$resultList = this.$app.find('.js_glResult_list');
      this.$resultWurcs = this.$app.find('.js_glResult_wurcs');
      this.$resultGlycoct = this.$app.find('.js_glResult_glycoct');
      this.$loading = this.$app.find('.js_loading_anim');
      this.$listBox = this.$app.find('.js_list_box');
    },

    bindEvents: function () {
      this.$searchInput.on('keyup', this.incSearch.bind(this));
      this.$searchInput.on('blur', this.endSearch.bind(this));
      this.$suggestList.on('click', 'li.searchSuggest_list', this.selectCondition.bind(this));
      this.$suggestList.on('mouseenter', 'li.searchSuggest_list', this.hoverCondition.bind(this));
      this.$app.on('keydown', this.suggestKeypress.bind(this));
      this.$adoptedArea.on('click', '.adoptedSearch_remove', this.removeCondition.bind(this));
      this.$adoptedArea.on('click', '.js_clear_adopted', this.clearConditions.bind(this));
      this.$adoptedArea.on('change', 'input.msRange_num', this.setMonosaccharideRange.bind(this));
      this.$massMin.on('change', this.setMass.bind(this));
      this.$massMax.on('change', this.setMass.bind(this));
      this.$allCelar.on('click', this.clearConditions.bind(this));
      this.$sortKey.on('change', this.doSort.bind(this));
      this.$sortDirec.on('change', this.doSort.bind(this));
      this.$viewSwitch.on('click', '.glResultSwitch_text', this.mainSwitch.bind(this));
      this.$pager.on('click', '.glResultPager_prev, .glResultPager_num, .glResultPager_next', this.goPage.bind(this));
      this.$app.on('mouseenter', '.js_zoomImg_box', util.zoomImg.bind());
      this.$app.on('mouseleave', '.js_zoomImg_box', util.zoomOutImg.bind());
      this.$searchArea.find('.js_show_name_list').on('click', this.showList.bind(this));
      this.$listBox.on('click', '.listBox_tabBtn', this.switchList.bind(this));
      this.$listBox.find('.js_listBox_close').on('click', this.hideList.bind(this));
      this.$listBox.find('.js_name_lists_area').on('click', 'li', this.selectFromList.bind(this));
    },

    setFromParam: function () {
      var params = util.get_params();
      if (params.motif === undefined || params.motif === '') {
        this.getMain(1, true);
        return;
      }
      this.addCondition('Motif', params.motif);
    },

    getMain: function (gopage, changeMass) {
      var _this = this;
      var monosaccharide_list = [];
      var i, ms_name, ms_keys;
      ms_keys = Object.keys(this.current_conditions.monosaccharide);
      for (i = 0; i < ms_keys.length; i += 1) {
        ms_name = ms_keys[i];
        monosaccharide_list.push(ms_name + '_Min_' + this.current_conditions.monosaccharide[ms_name][0] + '_Max_' + this.current_conditions.monosaccharide[ms_name][1]);
      }
      var page = (typeof gopage === 'number') ? gopage : 1;
      var offset = (page - 1) * 20;
      var obj = {
        massmin : (this.mass_values.min === this.mass_range.min && this.mass_values.max === this.mass_range.max) ? -1 : this.mass_values.min,
        massmax : (this.mass_values.min === this.mass_range.min && this.mass_values.max === this.mass_range.max) ? -1 : this.mass_values.max,
        motif : this.current_conditions.motif.join('__'),
        monosaccharide : monosaccharide_list.join('__'),
        order : this.$sortDirec.val(),
        orderkey : this.$sortKey.val(),
        offset : offset,
        lang : this.language
      };
      this.mass_values.min = obj.massmin;
      this.mass_values.max = obj.massmax;
      this.$loading.removeClass('loading_anim--hide');
      util.ajax_get('main_list', obj).then(function (data) {
        if (data === undefined || data === '') {
          _this.renderMain('', '', '', '', 1);
          return;
        }
        var data_set = data.split('<hr />');
        _this.renderMain(data_set[3], data_set[0], data_set[1], data_set[2], page);
        if (changeMass) {
          _this.renderMass(data_set[4]);
        }
        _this.setNameList(data_set[5], data_set[6]);
      }, function (err) {
        console.log(err);
      }).always(function () {
        _this.$searchInput.focus();
        _this.$loading.addClass('loading_anim--hide');
      });
    },

    renderMain: function (count_data, list_data, wurcs_data, structure_data, page) {
      var _this = this;
      var $list = $('<ol class="glResultList"></ol>');
      if (count_data === '') {
        count_data = 0;
      }
      var total = parseInt(count_data, 10);
      this.$totalNum.text(total);
      this.$pager.html(util.set_pager(parseInt(page, 10), total));
      this.$resultNothing.removeClass('glSearchNothing--show');
      if (list_data === '') {
        this.$resultNothing.addClass('glSearchNothing--show');
        this.$resultList.html('').append(_this.$resultNothing);
        this.$pager.html('');
      } else {
        $list.append(list_data);
        $list.find('.js-listTime').each(function () {
          var time_nums = $(this).text().split(/\-|\:|\s|\./);
          var date = new Date(time_nums[0], parseInt(time_nums[1], 10) - 1, time_nums[2], time_nums[3], time_nums[4], time_nums[5]);
          $(this).text(date.toUTCString());//.replace(/UTC$|GMT$/, ''));
        });
        $list.find('.js-massValue').each(function () {
          if ($(this).text() === 'NAN') {
            $(this).text('');
          }
        });
        this.$resultList.html($list);
      }
      if (structure_data === '') {
        structure_data = '<tr><td colspan="2">' + _this.$resultNothing.text() + '</td></tr>';
      }
      if (wurcs_data === '') {
        wurcs_data = '<tr><td colspan="2">' + _this.$resultNothing.text() + '</td></tr>';
      }
      this.$resultWurcs.children('tbody').html(wurcs_data);
      this.$resultWurcs.find('code').each(function () {
        var wurcs_code = $(this).text();
        var wurcs_decoded = decodeURIComponent(wurcs_code);
        $(this).text(wurcs_decoded);
      });
      this.$resultGlycoct.children('tbody').html(structure_data);
      this.$app.find('.js_zoomImg_box').each(function () {
        var $originalImg = $(this).children('.js_zoomImg');
        var src = IMG_PATH + $originalImg.data('acc') + '/image?style=extended&format=png&notation=' + _this.notation;
        $originalImg.attr('src', src);
        var img = $('<img>');
        img.attr('src', src);
        var $_this = $(this);
        img.bind('error', function () {
          $_this.html('<span>no picture</span>').addClass('js_noImg_box');
        });
      });
    },

    renderMass: function (data) {
      var _this = this;
      var vals = $.map(data.split('--'), function (n) {
        return parseInt(n, 10);
      });
      this.mass_range.min = vals[0];
      this.mass_range.max = vals[1];
      if (Number.isNaN(_this.mass_range.min)) {
        this.mass_range.min = 0;
      }
      if (Number.isNaN(_this.mass_range.max)) {
        this.mass_range.max = 0;
      }
      if (this.mass_range.max > 0) {
        this.mass_range.max += 1;
      }
      if (this.mass_values.min === -1 && this.mass_values.max === -1) {
        this.mass_values.min = this.mass_range.min;
        this.mass_values.max = this.mass_range.max;
      }
      if (this.mass_values.max > this.mass_range.max) {
        this.mass_values.max = this.mass_range.max;
      }
      if (this.mass_values.min < this.mass_range.min) {
        this.mass_values.min = this.mass_range.min;
      }
      this.$massSlider.children('#tmpSlider').remove();
      var $newSlider = $('<div id="tmpSlider"></div>');
      $newSlider.slider({
        range: true,
        min: _this.mass_range.min,
        max: _this.mass_range.max,
        values: [_this.mass_values.min, _this.mass_values.max],
        slide: function (event, ui) {
          _this.$massMin.val(ui.values[0]);
          _this.$massMax.val(ui.values[1]);
          _this.mass_values.min = ui.values[0];
          _this.mass_values.max = ui.values[1];
        },
        change: function (event) {
          if (event.originalEvent) {
            _this.getMain(1, true);
          }
        }
      });
      this.$massMin.val(_this.mass_values.min);
      this.$massMax.val(_this.mass_values.max);
      this.$massSlider.append($newSlider);
    },

    setMass: function () {
      var min = parseInt(this.$massMin.val(), 10);
      var max = parseInt(this.$massMax.val(), 10);
      if (min <= max) {
        if (min < this.$massSlider.children('#tmpSlider').slider('option', 'min')) {
          min = this.$massSlider.children('#tmpSlider').slider('option', 'min');
        }
        if (max > this.$massSlider.children('#tmpSlider').slider('option', 'max')) {
          max = this.$massSlider.children('#tmpSlider').slider('option', 'max');
        }
        this.mass_values.min = min;
        this.mass_values.max = max;
        this.$massSlider.children('#tmpSlider').slider('values', [this.mass_values.min, this.mass_values.max]);
        this.getMain(1, true);
      }
      this.$massMin.val(this.mass_values.min);
      this.$massMax.val(this.mass_values.max);
    },

    flushSuggest: function () {
      this.$suggestList.addClass('searchSuggest--blank').children('ul').html('');
      this.prev_word = '';
      this.showSuggest = false;
    },

    incSearchNotFound: function () {
      var $notFound = this.$searchArea.find('.incSearch_notfound');
      $notFound.addClass('incSearch_notfound--active');
      setTimeout(function () {
        $notFound.removeClass('incSearch_notfound--active');
      }, 3000);
      this.showSuggest = false;
    },

    incSearch: function () {
      var input = this.$searchInput.val();
      if (input === this.prev_word) {
        return;
      }
      if (input.length < 3) {
        this.flushSuggest();
        return;
      }
      this.prev_word = input;
      var data = [];
      var key, i, name, num, label, label_text, min, max, disabled, category;
      for (key in this.current_items) {
        for (i = 0; i < this.current_items[key].length; i += 1) {
          name = this.current_items[key][i].name;
          num = this.current_items[key][i].num;
          label = (key.charAt(0).toUpperCase() + key.slice(1)).replace(/s$/, '');
          min = this.current_items[key][i].min === undefined ? '' : this.current_items[key][i].min;
          max = this.current_items[key][i].max === undefined ? '' : this.current_items[key][i].max;
          disabled = '';
          if (key === 'motif') {
            if (this.current_conditions[key].indexOf(name) !== -1) {
              disabled = ' searchSuggest_list--disabled';
            }
          } else if (key === 'monosaccharide') {
            if (this.current_conditions[key][name] !== undefined) {
              disabled = ' searchSuggest_list--disabled';
            }
          }
          if (name.toLowerCase().indexOf(input.toLowerCase()) !== -1) {
            category = this.$adoptedArea.find('.js_adoptedSearch_' + label).children('.adoptedSearch_label').data('category');
            label_text = this.$adoptedArea.find('.js_adoptedSearch_' + label).children('.adoptedSearch_label').text();
            data.push('<li class="searchSuggest_list' + disabled + '"><span class="searchSuggest_label searchSuggest_label--' + label + '" data-category="' + category + '">' + label_text + '</span>');
            data.push('<span class="searchSuggest_value" data-min="' + min + '" data-max="' + max + '">' + name + '</span>&nbsp;<span class="searchSuggest_num">' + num + '</span></li>');
          }
        }
      }
      if (data.length > 0) {
        this.$suggestList.children('ul').html(data.join("\n"));
        this.$suggestList.children('ul').children('li:first-child').addClass('searchSuggest_list--current');
        this.$suggestList.removeClass('searchSuggest--blank');
        this.showSuggest = true;
      } else {
        this.$suggestList.children('ul').html('');
        this.$suggestList.addClass('searchSuggest--blank');
        this.incSearchNotFound();
      }
    },

    endSearch: function () {
      var _this = this;
      this.$searchInput.val('');
      setTimeout(function () {
        _this.flushSuggest();
      }, 500);
      this.showSuggest = false;
    },

    suggestKeypress: function (e) {
      if (!this.showSuggest) {
        return;
      }
      var $current, $target;
      if (e.keyCode === KEY_ENTER) {
        e.preventDefault();
        $current = this.$suggestList.children('ul').children('li.searchSuggest_list--current');
        $current.trigger('click');
      } else if (e.keyCode === KEY_UP) {
        e.preventDefault();
        $current = this.$suggestList.children('ul').children('li.searchSuggest_list--current');
        $target = $current.prev('li.searchSuggest_list');
        if ($target.length > 0) {
          $current.removeClass('searchSuggest_list--current');
          $target.addClass('searchSuggest_list--current');
        }
      } else if (e.keyCode === KEY_DOWN) {
        e.preventDefault();
        $current = this.$suggestList.children('ul').children('li.searchSuggest_list--current');
        $target = $current.next('li.searchSuggest_list');
        if ($target.length > 0) {
          $current.removeClass('searchSuggest_list--current');
          $target.addClass('searchSuggest_list--current');
        }
      }
    },

    hoverCondition: function (e) {
      var $hovered = $(e.currentTarget);
      this.$suggestList.children('ul').children('li.searchSuggest_list--current').removeClass('searchSuggest_list--current');
      $hovered.addClass('searchSuggest_list--current');
    },

    selectCondition: function (e) {
      var $clicked = $(e.currentTarget);
      if ($clicked.hasClass('searchSuggest_list--disabled')) {
        return;
      }
      var category = $clicked.children('span.searchSuggest_label').data('category');
      var $item_value = $clicked.children('span.searchSuggest_value');
      this.$searchInput.val('');
      this.addCondition(category, $item_value.text(), $item_value.data('min'), $item_value.data('max'));
    },

    addCondition: function (category, item_name, item_min, item_max) {
      var cat_name = category.toLowerCase();
      if (cat_name === 'motif') {
        this.current_conditions.motif.push(item_name);
      } else if (cat_name === 'monosaccharide') {
        this.current_conditions.monosaccharide[item_name] = [item_min, item_max, item_min, item_max];
      }
      this.flushSuggest();
      this.getMain(1, true);
    },

    setConditionView: function () {
      var _this = this;
      var is_set = false;
      var $categoryArea, $categoryUl, $list_item, item_name, item_min, item_max, i;
      //motif
      $categoryArea = this.$adoptedArea.find('.js_adoptedSearch_Motif');
      $categoryArea.children('ul.adoptedSearch_ul').remove();
      $categoryUl = $('<ul class="adoptedSearch_ul"></ul>');
      $categoryArea.append($categoryUl);
      if (this.current_conditions.motif.length < 1) {
        $categoryArea.addClass('adoptedSearch_group--empty');
      } else {
        for (i = 0; i < this.current_conditions.motif.length; i += 1) {
          item_name = this.current_conditions.motif[i];
          $list_item = $('<li class="adoptedSearch_item js_adopted_item_Motif"><span class="adoptedSearch_itemName">' + item_name + '</span><span class="adoptedSearch_range"></span><span class="adoptedSearch_remove">Remove</span></li>');
          $categoryUl.append($list_item);
        }
        $categoryArea.removeClass('adoptedSearch_group--empty');
        is_set = true;
      }
      //monosaccharide
      var item_value, item_range, $range_slider, $range_input_min, $range_input_max, current_name;
      $categoryArea = this.$adoptedArea.find('.js_adoptedSearch_Monosaccharide');
      $categoryArea.children('ul.adoptedSearch_ul').remove();
      $categoryUl = $('<ul class="adoptedSearch_ul"></ul>');
      $categoryArea.append($categoryUl);
      var ms_keys = Object.keys(this.current_conditions.monosaccharide);
      if (ms_keys.length < 1) {
        $categoryArea.addClass('adoptedSearch_group--empty');
      } else {
        for (i = 0; i < ms_keys.length; i += 1) {
          item_name = ms_keys[i];
          item_min = this.current_conditions.monosaccharide[item_name][0];
          item_max = this.current_conditions.monosaccharide[item_name][1];
          $list_item = $('<li class="adoptedSearch_item js_adopted_item_Monosaccharide"><span class="adoptedSearch_itemName">' + item_name + '</span><span class="adoptedSearch_range"></span><span class="adoptedSearch_remove">Remove</span></li>');
          item_value = [parseInt(item_min, 10), parseInt(item_max, 10)];
          $range_slider = $('<span class="msRange_slider"></span>');
          $range_input_min = $('<input class="msRange_num range_min" type="text" size="5" value="' + item_value[0] + '" />');
          $range_input_max = $('<input class="msRange_num range_max" type="text" size="5" value="' + item_value[1] + '" />');
          item_range = [item_value[0], item_value[1]];
          $range_slider.slider({
            range: true,
            min: item_range[0],
            max: item_range[1],
            values: item_value,
            slide: function (event, ui) {
              $(this).parent('span.adoptedSearch_range').children('.range_min').val(ui.values[0]);
              $(this).parent('span.adoptedSearch_range').children('.range_max').val(ui.values[1]);
            },
            change: function (event, ui) {
              if (event.originalEvent) {
                current_name = $(this).parent('span.adoptedSearch_range').prev('.adoptedSearch_itemName').text();
                _this.current_conditions.monosaccharide[current_name][0] = ui.values[0];
                _this.current_conditions.monosaccharide[current_name][1] = ui.values[1];
                _this.getMain(1, true);
              }
            }
          });
          $list_item.find('.adoptedSearch_range').append($range_slider).append($range_input_min).append('&nbsp;〜&nbsp;').append($range_input_max);
          $categoryUl.append($list_item);
        }
        $categoryArea.removeClass('adoptedSearch_group--empty');
        is_set = true;
      }
      if (is_set) {
        this.$adoptedArea.removeClass('adoptedSearch--empty');
      } else {
        this.$adoptedArea.addClass('adoptedSearch--empty');
      }
    },

    setMonosaccharideRange: function (e) {
      var $parent = $(e.currentTarget).parent('span.adoptedSearch_range');
      var $slider = $parent.children('.msRange_slider');
      var current_values = [$slider.slider('values', 0), $slider.slider('values', 1)];
      var min = parseInt($parent.children('input.range_min').val(), 10);
      var max = parseInt($parent.children('input.range_max').val(), 10);
      if (min <= max) {
        if (min < $slider.slider('option', 'min')) {
          min = $slider.slider('option', 'min');
        }
        if (max > $slider.slider('option', 'max')) {
          max = $slider.slider('option', 'max');
        }
        $slider.slider('values', [min, max]);
        var item_name = $parent.prev('.adoptedSearch_itemName').text();
        this.current_conditions.monosaccharide[item_name][0] = min;
        this.current_conditions.monosaccharide[item_name][1] = max;
        this.getMain(1, true);
      } else {
        min = current_values[0];
        max = current_values[1];
      }
      $parent.children('input.range_min').val(min);
      $parent.children('input.range_max').val(max);
    },

    removeCondition: function (e) {
      var $clicked = $(e.target);
      var $target = $clicked.parent('li.adoptedSearch_item');
      var target_name = $target.children('span.adoptedSearch_itemName').text();
      var category = $target.hasClass('js_adopted_item_Motif') ? 'motif' : 'monosaccharide';
      var del_index;
      if (category === 'motif') {
        del_index = this.current_conditions.motif.indexOf(target_name);
        this.current_conditions.motif.splice(del_index, 1);
      } else if (category === 'monosaccharide') {
        delete this.current_conditions.monosaccharide[target_name];
      }
      this.getMain(1, true);
    },

    clearConditions: function () {
      this.$adoptedArea.find('.adoptedSearch_group').each(function () {
        $(this).addClass('adoptedSearch_group--empty').find('ul.adoptedSearch_ul').remove();
      });
      this.$adoptedArea.find('.js_clear_adopted').addClass('adoptedSearch_clear--disabled');
      this.$adoptedArea.addClass('adoptedSearch--empty');
      this.current_conditions.motif = [];
      this.current_conditions.monosaccharide = {};
      this.mass_range = {min: 0, max: 0};
      this.mass_values = {min: -1, max: -1};
      this.getMain(1, true);
    },

    mainSwitch: function (e) {
      var $clicked = $(e.target);
      if ($clicked.hasClass('glResultSwitch_text--current')) {
        return;
      }
      var target = $clicked.data('view');
      if (target === 'list') {
        this.$resultList.addClass('glResult--showing');
        this.$resultWurcs.removeClass('glResult--showing');
        this.$resultGlycoct.removeClass('glResult--showing');
      } else if (target === 'wurcs') {
        this.$resultList.removeClass('glResult--showing');
        this.$resultWurcs.addClass('glResult--showing');
        this.$resultGlycoct.removeClass('glResult--showing');
      } else {
        this.$resultList.removeClass('glResult--showing');
        this.$resultWurcs.removeClass('glResult--showing');
        this.$resultGlycoct.addClass('glResult--showing');
      }
      this.$viewSwitch.find('.glResultSwitch_text').removeClass('glResultSwitch_text--current');
      $clicked.addClass('glResultSwitch_text--current');
    },

    doSort: function () {
      this.getMain(1, false);
    },

    goPage: function (e) {
      var $clicked = $(e.target);
      if ($clicked.hasClass('glResultPager_num--current')) {
        return;
      }
      var gopage = parseInt($clicked.data('gopage'), 10);
      this.getMain(gopage, false);
    },

    setNameList: function (motif_data, monosaccharide_data) {
      var _this = this;
      _this.$listBox.find('.js_name_lists_area').html(motif_data + monosaccharide_data);
      if (_this.$listBox.find('.js_listBox_tabMotifs').hasClass('listBox_tabBtn--current')) {
        _this.$listBox.find('.js_listMotifs').addClass('listBox_ul--current');
      } else {
        _this.$listBox.find('.js_listMonosaccharides').addClass('listBox_ul--current');
      }
      _this.refreshItemList();
    },

    showList: function (e) {
      var $clicked = $(e.currentTarget);
      var category = $clicked.data('category');
      this.$listBox.removeClass('listBox--hide');
      this.$listBox.find('.listBox_tabBtn').removeClass('listBox_tabBtn--current');
      this.$listBox.find('.listBox_ul').removeClass('listBox_ul--current');
      this.$listBox.find('.js_list' + category).addClass('listBox_ul--current');
      this.$listBox.find('.js_listBox_tab' + category).addClass('listBox_tabBtn--current');
    },

    switchList: function (e) {
      var $clicked = $(e.currentTarget);
      if ($clicked.hasClass('listBox_tabBtn--current')) {
        return;
      }
      var target = $clicked.data('category');
      this.$listBox.find('.listBox_tabBtn').removeClass('listBox_tabBtn--current');
      this.$listBox.find('.listBox_ul').removeClass('listBox_ul--current');
      $clicked.addClass('listBox_tabBtn--current');
      this.$listBox.find('.js_list' + target).addClass('listBox_ul--current');
    },

    hideList: function () {
      this.$listBox.addClass('listBox--hide');
    },

    selectFromList: function (e) {
      var $clicked = $(e.currentTarget);
      var category;
      if ($clicked.hasClass('listBox_name--disabled')) {
        return;
      }
      if ($clicked.parent('ul').hasClass('js_listMonosaccharides')) {
        category = 'Monosaccharide';
      } else {
        category = 'Motif';
      }
      this.addCondition(category, $clicked.children('.listBox_itemName').text(), $clicked.data('min'), $clicked.data('max'));
    },

    refreshItemList: function () {
      var _this = this;
      this.current_items.motif = [];
      this.current_items.monosaccharide = [];
      this.$listBox.find('.js_listMotifs').find('li').each(function () {
        var name = $(this).children('.listBox_itemName').text();
        var num = $(this).children('.listBox_itemNum').text();
        _this.current_items.motif.push({name: name, num: num});
        if (_this.current_conditions.motif.indexOf(name) !== -1) {
          $(this).addClass('listBox_name--disabled');
        } else {
          $(this).removeClass('listBox_name--disabled');
        }
      });
      var name, num, min, max, range_min, range_max;
      this.$listBox.find('.js_listMonosaccharides').find('li').each(function () {
        name = $(this).children('.listBox_itemName').text();
        num = $(this).children('.listBox_itemNum').text();
        min = $(this).data('min');
        max = $(this).data('max');
        range_min = _this.current_conditions.monosaccharide[name] !== undefined ? _this.current_conditions.monosaccharide[name][2] : min;
        range_max = _this.current_conditions.monosaccharide[name] !== undefined ? _this.current_conditions.monosaccharide[name][3] : max;
        _this.current_items.monosaccharide.push({name: name, num: num, min: min, max: max});
        if (_this.current_conditions.monosaccharide[name] !== undefined) {
          _this.current_conditions.monosaccharide[name] = [min, max, range_min, range_max];
          $(this).addClass('listBox_name--disabled');
        } else {
          $(this).removeClass('listBox_name--disabled');
        }
        if (name === '') {
          this.remove();
        }
      });
      this.setConditionView();
    }

  }; //listApp END.

////////////////////////////////////////

//glycan entry page
  var entryApp = {

    init: function () {
      this.cacheElements();
      this.bindEvents();
      this.accNum = util.get_id();
      this.$title.text(this.accNum);
      this.notation = this.$app.data('notation') || 'cfg';
      this.language = this.$app.data('lang') || '1';
      this.getEntry();
    },

    cacheElements: function () {
      this.$app = $('#glycan_entry_app');
      this.$title = this.$app.find('.glycan_entry_acc');
      this.$entryInfo = this.$app.find('.entryInfo');
      this.$infoNotfound = this.$app.find('.glycan_entry_notFound');
      this.$entryData = this.$app.find('.entryMain');
      this.$listView = this.$app.find('.cardView');
      this.$listStatus = this.$app.find('.entryMain_stat');
      this.$listNav = this.$app.find('.entryMain_menu');
      this.$listTitle = this.$app.find('.entryMain_title');
      this.$loadingEntry = this.$app.find('.js_loading_anim_entry');
      this.$loadingList = this.$app.find('.js_loading_anim_list');
    },

    bindEvents: function () {
      this.$app.on('click', '.js_list_structure_more', this.showListStructure.bind(this));
      this.$app.on('click', '.js_list_structure_hide', this.hideListStructure.bind(this));
      this.$app.on('click', '.infoStructure_switch_btn', this.switchStructure.bind(this));
      this.$app.on('mouseenter', '.js_list_img', util.zoomImg.bind());
      this.$app.on('mouseleave', '.js_list_img', util.zoomOutImg.bind());
      this.$listNav.on('click', 'li', this.changeList.bind(this));
    },

    getEntry: function () {
      var _this = this;
      var obj = {acc: this.accNum, lang: this.language};
      this.$loadingEntry.removeClass('entry_loading--hide');
      util.ajax_get('glycan_entry', obj).then(function (data) {
        if (data === '') {
          _this.$entryInfo.html('').append(_this.$infoNotfound);
          return;
        }
        _this.$entryInfo.html(data);
        _this.renderEntry();
        _this.$entryData.each(function () {
          var init_category = $(this).data('init');
          var init_stanza = $(this).find('.entryMain_menuList--current').children('.entryMain_menuText').data('stanza');
          _this.getList(init_stanza, $(this), init_category);
        });
      }, function (err) {
        console.log(err);
      }).always(function () {
        _this.$loadingEntry.addClass('entry_loading--hide');
      });
    },

    renderEntry: function () {
      this.$entryInfo.find('.infoBox_accNum').text(this.accNum);
      var src = IMG_PATH + this.accNum + '/image?style=extended&format=png&notation=' + this.notation;
      this.$entryInfo.find('.entryInfo_img').attr('src', src);
      var time_nums = this.$entryInfo.find('.infoBox_time').text().split(/\-|\:|\s|\./);
      var date = new Date(time_nums[0], parseInt(time_nums[1], 10) - 1, time_nums[2], time_nums[3], time_nums[4], time_nums[5]);
      this.$entryInfo.find('.infoBox_time').text(date.toUTCString());//.replace(/UTC$|GMT$/, ''));
      var wurcs_code = this.$entryInfo.find('.infoStructure_code-wurcs').find('code').text();
      var wurcs_decoded = decodeURIComponent(wurcs_code);
      this.$entryInfo.find('.infoStructure_code-wurcs').find('code').text(wurcs_decoded);
      this.structureHeight = this.$app.find('.infoBox_3cols').innerHeight() - 50;
    },

    getList: function (use_stanza, $dataArea, category) {
      var _this = this;
      var obj = {category: category, acc: this.accNum, lang: this.language};
      $dataArea.find(this.$loadingList).removeClass('entry_loading--hide');
      util.ajax_get(use_stanza, obj).then(function (data) {
        $dataArea.find(_this.$listView).html(data);
        _this.renderList($dataArea);
      }, function (err) {
        console.log(err);
      }).always(function () {
        $dataArea.find(_this.$loadingList).addClass('entry_loading--hide');
      });
    },

    renderList: function ($dataArea) {
      var _this = this;
      $dataArea.find('.js_zoomImg').each(function () {
        var src = IMG_PATH + $(this).data('acc') + '/image?style=extended&format=png&notation=' + _this.notation;
        $(this).attr('src', src);
      });
      $dataArea.find('.cardView_disName').each(function () {
        var text = $(this).text();
        $(this).text(text.replace('http://www.ncbi.nlm.nih.gov/mesh?term=', ''));
      });
      var count = $dataArea.find('li.cardView_li, .cardView_disName').length;
      if ($dataArea.find(this.$listStatus).find('.entryMain_count').length > 0) {
        $dataArea.find(this.$listStatus).find('.entryMain_count').text(count);
      }
    },

    setZoomImg: function () {
      this.$app.find('.js_list_img').each(function () {
        var $originalImg = $(this).children('.js_zoomImg');
        var src = $originalImg.attr('src');
        var img = $('<img>');
        img.attr('src', src);
        var $_this = $(this);
        img.bind('error', function () {
          $_this.html('<span>no picture</span>').addClass('js_noImg_box');
        });
      });
    },

    switchStructure: function (e) {
      var $clicked = $(e.target);
      if ($clicked.hasClass('.infoStructure_switch_btn--active')) {
        return;
      }
      var target_name = $clicked.data('format');
      var $target = $('.infoStructure_code-' + target_name);
      $('.infoStructure_code').addClass('infoStructure_code--hide');
      $target.removeClass('infoStructure_code--hide');
      $('.infoStructure_switch_btn').removeClass('infoStructure_switch_btn--active');
      $clicked.addClass('infoStructure_switch_btn--active');
    },

    showListStructure: function (e) {
      var $clicked = $(e.target);
      var $target = $clicked.parent('.flexCodeWrapper');
      $target.addClass('flexCodeWrapper--open');
    },

    hideListStructure: function (e) {
      var $clicked = $(e.target);
      var $target = $clicked.parent('.flexCodeWrapper');
      $target.removeClass('flexCodeWrapper--open');
    },

    changeList: function (e) {
      var $clicked = $(e.currentTarget);
      if ($clicked.hasClass('entryMain_menuList--current')) {
        return;
      }
      var $dataArea = $($clicked.closest(this.$entryData));
      var use_stanza = $clicked.children('.entryMain_menuText').data('stanza');
      $dataArea.find('li.entryMain_menuList').removeClass('entryMain_menuList--current');
      $clicked.addClass('entryMain_menuList--current');
      var category = $clicked.children('.entryMain_menuText').data('category');
      $dataArea.find(this.$listTitle).text(category);
      this.getList(use_stanza, $dataArea, category.toLowerCase());
    }

  }; //entryApp END.

  ////////////////////////////////////////

  //top page status
  var statusApp = {
    init: function () {
      this.cacheElements();
      this.getStatus();
    },

    cacheElements: function () {
      this.$app = $('#top_status_app');
      this.$total = this.$app.find('.statusTotalCount');
      this.$motif = this.$app.find('.statusMotifCount');
      this.$monosaccharide = this.$app.find('.statusMonosaccharideCount');
    },

    getStatus: function () {
      var _this = this;
      var obj = {};
      util.ajax_get('top_status', obj).then(function (data) {
        var values = data.split('<hr />');
        _this.$total.text(values[0]);
        _this.$motif.text(values[1]);
        _this.$monosaccharide.text(values[2]);
      }, function (err) {
        console.log(err);
      });
    }

  }; //statusApp END.


////////////////////////////////////////

//routing
  if ($('#glycan_list_app').length > 0) {
    listApp.init();
  } else if ($('#glycan_entry_app').length > 0) {
    entryApp.init();
  } else if ($('#top_status_app').length > 0) {
    statusApp.init();
  }

});
