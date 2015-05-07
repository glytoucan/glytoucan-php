<?php
class GlycanEntryBehavior extends ModelBehavior
{
	public function loadGlycan(Model $virtuoso, $gid) {
		$query = '
			prefix rings:<http://www.rings.t.soka.ac.jp/2013/12/rdf#>
			select ?gid ?image ?interactions ?kcf ?linucs ?linearcode ?glycoct ?glycomedb ?rid
			from <http://www.rings.t.soka.ac.jp/2013/12/rdf>
			where {
				?glycan rings:has_glycan_id "$gid" .
				?glycan rings:has_glycan_id ?gid .
				?glycan rings:has_image ?image .
		';
		$virtuoso_res = $virtuoso->query($query);
	}
}
