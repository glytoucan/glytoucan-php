<?php

// ////
// ヘルプコメントの書き方
// ${ContlloerName}_{viewName}_{a place of helpComment} = 'help comment';
// ////
// 変数の種類を定義する
$nameSpace = array (
		'Title',
		'Top',
		'TopTitle',
		'Right',
		'RightTitle',
		'Left',
		'LeftTitle',
		'Bottom',
		'BottomTitle',
		'BottomFigure',
		'Foot' ,
		'FootTitle',
    'FootBottom',
		'Register',
		'Error',
		'ErrorMessage',
		'Registered',
);

// Home Start
$Stanzas_Index_Right = 'GlyTouCanは、国際的な糖鎖構造リポジトリのウェブインターフェースです。
当リポジトリは無料で利用することができるキュレーションされていない糖鎖構造のレジストリです。構造を特定するために使用された実験方法によって与えられた情報のレベルに関係なく、どのような糖鎖にも国際的にユニークなアクセッション番号が割り当てられます。
単糖類組成からグリコシド結合形状などの明確な構造にわたり分解に幅があるどのような糖鎖構造も構造に不一致がない限り当リポジトリに登録をすることができます。
		
当サイト利用者は、当レポジトリに登録されている糖鎖構造とモチーフを検索することが出来ます。
当サイトに登録をした利用者は、許可を得た後に出版物や他のデータベースに使用可能な独自のIDを保有する新規の糖鎖構造を登録することが出来ます。

当リポジトリは、文部科学省によるデータベース統合プロジェクトおよび独立行政法人科学技術振興機構によるデータベース統合コーディネートプロジェクトからの助成金により開発されています。';
$Stanzas_Index_FootBottom = 'Copyright © 2014 GlyTouCan';
// Home End

// Glycan Registration Start
$Registries_Index_Title ='糖鎖の登録';
$Registries_Index_Left = '下記枠内に糖鎖構造をGlycoCT condensed formatで入力してください。';
$Registries_Index_RightTitle = 'GlycoCT condensed formatの例：GlycoCT フォーマットで表した反復構造を含む糖鎖構造';
 $Registries_Index_Right = '
  RES
  1b:a-dgal-HEX-1:5
  2s:N-acetyl
  3b:b-dgal-HEX-1:5
  4r:r1
  5b:a-dgro-dgal-NON-2:6|1:a|2:keto|3:d
  6s:n-acetyl
  7r:r2
  8b:a-dgro-dgal-NON-2:6|1:a|2:keto|3:d
  9s:n-acetyl
  LIN
  1:1d(2+1)2n
  2:1o(3+1)3d
  3:3o(3+1)4n
  4:4n(3+2)5d
  5:5d(5+1)6n
  6:1o(6+1)7n
  7:7n(3+2)8d
  8:8d(5+1)9n
  REP
  REP1:13o(3+1)10d=-1--1
  RES
  10b:b-dglc-HEX-1:5
  11s:n-acetyl
  12b:a-lgal-HEX-1:5|6:d
  13b:b-dgal-HEX-1:5
  14s:sulfate
  LIN
  9:10d(2+1)11n
  10:10o(3+1)12d
  11:10o(4+1)13d
  12:10o(6+1)14n
  REP2:18o(3+1)15d=-1--1
  RES
  15b:b-dgal-HEX-1:5
  16s:n-acetyl
  17b:a-lgal-HEX-1:5|6:d
  18b:b-dgal-HEX-1:5
  19s:sulfate
  LIN
  13:15d(2+1)16n
  14:15o(3+1)17d
  15:15o(4+1)18d
  16:15o(6+1)19n';
// Glycan Registration End ※14,15,16変更

//Confirmation Start
$Registries_Confirmation_Title ='Registration Confirmation';
$Registries_Confirmation_Register ='The following structure(s) will be registered upon clicking the submit button.';
$Registries_Confirmation_Error ='An error occurred. Please check sructure(s) again.';
$Registries_Confirmation_ErrorMessage ='Structure(s) cannot be parsed. Please check structure(s) and try again.';
$Registries_Confirmation_Registered ='The following structure(s) have already been registered.';
//Confirmation End

//Complete
$Registries_Complete_Title ='Complete';
$Registries_Complete_Top ='';

// Structure Serch Start
$Structures_StructureSearch_Title = '構造の検索';
//Left
$Structures_StructureSearch_Left [0] = '';
$Structures_StructureSearch_Left [1] = '検索の種類';
$Structures_StructureSearch_Left [2] = '全く同じ構造を検索';
$Structures_StructureSearch_Left [3] = '部分構造を検索';
$Structures_StructureSearch_Left [4] = '配列のフォーマットを選択';
$Structures_StructureSearch_Left [5] = 'GlycoCT condensed';
$Structures_StructureSearch_Left [6] = 'CarbBank';
$Structures_StructureSearch_Left [7] = 'GlycoMinds (Linear Code®)';
$Structures_StructureSearch_Left [8] = 'BCSDB';
$Structures_StructureSearch_Left [9] = 'LINUCS';
$Structures_StructureSearch_Left [10] = 'KCF';
//Right
$Structures_StructureSearch_RightTitle [0] = '検索の種類';
$Structures_StructureSearch_RightTitle [1] = '全く同じ構造を検索';
$Structures_StructureSearch_Right [1] = '入力した糖鎖構造と全く同じ構造の糖鎖を検索します。';
$Structures_StructureSearch_RightTitle [2] = '部分構造を検索';
$Structures_StructureSearch_Right [2] = '入力した糖鎖構造を含む全ての部分構造を検索します。';
//Bottom
$Structures_StructureSearch_BottomTitle[0] = '';
$Structures_StructureSearch_BottomTitle[1] = 'GlycoCT condensed';
$Structures_StructureSearch_Bottom[1] = 'GlycoCTフォーマットは、接続表アプローチをもとに糖質配列を記述するために糖質構造をコード化する図式です。このフォーマットは、反復単位などのような糖質配列を記述するブロックコンセプトを使用して一貫したコンピューターが解読できる命名法を生成するために、IUPACルールを適応しています。 GlycoCTフォーマットはcondensedフォーマットとXMLフォーマットの２つの変異体があります。condensedフォーマットは、コンパクトな方法で糖鎖構造の特有な識別を可能にします。
単糖の置換基は基底型に帰属する分離した残基として扱われます。この置換基は塩基残基のひとつとして明記することによって識別されます。
これらの置換基は、残基数の直後に次のコードの1つを特定することによって区別されます。
b=基底型、s=置換基、r=反復単位、a=代替単位
表1.2はGlycoCTによって取り扱われる置換基のリストです。
GlycoCTフォーマットは、残基がRESセクションで特定されまたLINセクションで結合しているところがKCFフォーマットと類似しています。'; 
$Structures_StructureSearch_BottomFigure[1] = '<br>
表1.1：GlycoCTで使用される単糖と3文字コードのリスト
<table border="1" cellspacing="0" cellpadding="3">
  <tr style="background:#ccccff">
    <th>Monosaccharide name</th>
    <th>Three-letter code</th>
    <th>Superclass</th>
  </tr>
  <tr>
    <td>Allose</td>
    <td>ALL</td>
    <td>HEX</td>
  </tr>
  <tr>
    <td>Altrose</td>
    <td>ALT</td>
    <td>HEX</td>
  </tr>
  <tr>
    <td>Arabinose</td>
    <td>ARA</td>
    <td>PEN</td>
  </tr>
  <tr>
    <td>Erythrose</td>
    <td>ERY</td>
    <td>TET</td>
  </tr>
  <tr>
    <td>Galactose</td>
    <td>GAL</td>
    <td>HEX</td>
  </tr>
  <tr>
    <td>Glucose</td>
    <td>GLC</td>
    <td>HEX</td>
  </tr>
  <tr>
    <td>Glyceraldehyde</td>
    <td>GRO</td>
    <td>TRI</td>
  </tr>
  <tr>
    <td>Gulose</td>
    <td>GUL</td>
    <td>HEX</td>
  </tr>
  <tr>
    <td>Idose</td>
    <td>IDO</td>
    <td>HEX</td>
  </tr>
  <tr>
    <td>Lyxose</td>
    <td>LYX</td>
    <td>PEN</td>
  </tr>
  <tr>
    <td>Mannose</td>
    <td>MAN</td>
    <td>HEX</td>
  </tr>
  <tr>
    <td>Ribose</td>
    <td>RIB</td>
    <td>PEN</td>
  </tr>
   <tr>
    <td>Talose</td>
    <td>TAL</td>
    <td>HEX</td>
  </tr>
   <tr>
    <td>Threose</td>
    <td>TRE</td>
    <td>TET</td>
  </tr>
   <tr>
    <td>Xylose</td>
    <td>XYL</td>
    <td>PEN</td>
  </tr>
</table>
<br>
表1.2：GlycoCTに使用される置換基のリスト
<table border="1" cellspacing="0" cellpadding="3">
  <tr>
    <td>acetyl</td>
    <td>amidino</td>
    <td>amino</td>
  </tr>
  <tr>
    <td>anhydro</td>
    <td>bromo</td>
    <td>chloro</td>
  </tr>
  <tr>
    <td>diphospho</td>
    <td>epoxy</td>
    <td>ethanolamine</td>
  </tr>
  <tr>
    <td>ethyl</td>
    <td>fluoro</td>
    <td>formyl</td>
  </tr>
  <tr>
    <td>glycolyl</td>
    <td>hydroxymethyl</td>
    <td>imino</td>
  </tr>
  <tr>
    <td>iodo</td>
    <td>lactone</td>
    <td>methyl</td>
  </tr>
  <tr>
    <td>N-acetyl</td>
    <td>N-alanine</td>
    <td>N-amidino</td>
  </tr>
  <tr>
    <td>N-dimethyl</td>
    <td>N-formyl</td>
    <td>N-glycolyl</td>
  </tr>
  <tr>
    <td>N-methyl</td>
    <td>N-methyl-carbomoyl</td>
    <td>N-succinate</td>
  </tr>
  <tr>
    <td>N-sulfate</td>
    <td>N-triflouroacetyl</td>
    <td>nitrate</td>
  </tr>
  <tr>
    <td>phosphate</td>
    <td>phospho-choline</td>
    <td>phospho-ethanolamine</td>
  </tr>
  <tr>
    <td>pyrophosphate</td>
    <td>pyruvate</td>
    <td>succinate</td>
  </tr>
  <tr>
    <td>sulfate</td>
    <td>thio</td>
    <td>triphosphate</td>
  </tr>
  <tr>
    <td>(r)-1-hydroxyethyl</td>
    <td>(r)-carboxyethyl</td>
    <td>(r)-carboxymethyl</td>
  </tr>
  <tr>
    <td>(r)-lactate</td>
    <td>(r)-pyruvate</td>
    <td>(s)-1-hydroxyethyl</td>
  </tr>
  <tr>
    <td>(s)-carboxyethyl</td>
    <td>(s)-carboxymethyl</td>
    <td>(s)-lactate</td>
  </tr>
  <tr>
    <td>(s)-pyruvate</td>
    <td>(x)-lactate</td>
    <td>(x)-pyruvate</td>
  </tr>
</table>
<br>
GlycoCTの例：GlycoCTフォーマットで表した反復単位を含む糖鎖
		
<pre>
  RES
  1b:a-dgal-HEX-1:5
  2s:n-acetyl
  3b:b-dgal-HEX-1:5
  4r:r1
  5b:a-dgro-dgal-NON-2:6|1:a|2:keto|3:d
  6s:n-acetyl
  7r:r2
  8b:a-dgro-dgal-NON-2:6|1:a|2:keto|3:d
  9s:n-acetyl
  LIN
  1:1d(2+1)2n
  2:1o(3+1)3d
  3:3o(3+1)4n
  4:4n(3+2)5d
  5:5d(5+1)6n
  6:1o(6+1)7n
  7:7n(3+2)8d
  8:8d(5+1)9n
  REP
  REP1:13o(3+1)10d=-1--1
  RES
  10b:b-dglc-HEX-1:5
  11s:n-acetyl
  12b:a-lgal-HEX-1:5|6:d
  13b:b-dgal-HEX-1:5
  14s:sulfate
  LIN
  9:10d(2+1)11n
  10:10o(3+1)12d
  11:10o(4+1)13d
  12:10o(6+1)14n
  REP2:18o(3+1)15d=-1--1
  RES
  15b:b-dgal-HEX-1:5
  16s:n-acetyl
  17b:a-lgal-HEX-1:5|6:d
  18b:b-dgal-HEX-1:5
  19s:sulfate
  LIN
  13:15d(2+1)16n
  14:15o(3+1)17d
  15:15o(4+1)18d
  16:15o(6+1)19n
</pre>
';
//$Structures_StructureSearch_BottomTitle[2] = 'GLYDE-II';
//$Structures_StructureSearch_Bottom[2] = ' It is the XML data exchange format for carbohydrate structures of complex glycans. The syntacic of GLYDE-II is defined in the document type definition (DTD) of the standard that defines XML  ELEMENT types, which make up the GLYDE-II file.';
//$Structures_StructureSearch_BottomTitle[3] = 'GlycoCT XML';
//$Structures_StructureSearch_Bottom[3] = 'GlycoCT format is encoding schema for carbohydrate sequences based on a connection table approach to describe carbohydrate sequences.  The format is adopting IUPAC rules to generate a consistent, machine-readable nomenclature using a block concept to describe carbohydrate sequences like repeating units. It consists of two variants, a condensed format and an XML format. The XML format facilitates data exchange.';
$Structures_StructureSearch_BottomTitle[4] = 'CarbBank';
$Structures_StructureSearch_Bottom[4] = 'IUPACは、構造が複数線で書いてあるextended IUPACフォームを示唆します。
このフォーマットはもとはCarbBankで使用されていたため、CarbBankと称されることがあります。単糖の表示はIUPACフォーマットと同じで、各単糖残基に先立って、アノマー記述子と構造記号と環サイズが斜字体のfかpで表示されます。
もしα/β, D/L, f/p のいずれかが省略された場合は、構造上の詳細は不明と想定されます。
このフォーマットは、αとβはそれぞれaとbに置き換えます。また、矢印（→）はハイフン（-）、上（↑）と下（↓）はバー（|）に置換えられます。';
$Structures_StructureSearch_BottomFigure[4] = '<pre>
CarbBankフォーマットの例：CarbBank(extended IUPAC)フォーマットで表したN-グリカンコア構造。 
    a-D-Manp-(1-6)+
                  |
             b-D-Manp-(1-4)-b-D-GlcpNAc-(1-4)-a-D-GlcpNAc
                  |
    a-D-Manp-(1-3)+             
</pre>';//↑★pのフォントは他と異なるため注意
$Structures_StructureSearch_BottomTitle[5] = 'GlycoMinds (Linear Code®)';
$Structures_StructureSearch_Bottom[5] = 'Carbohydrate formatであるGlycoMindsはLinear Code®としても知られており、単糖を一文字で命し、なおかつグリコシド結合の凝縮記述が入ります。単糖表示は、単糖の共通構造に基づいています。そして共通構造への修飾は次のような特異的シンボルによって表されます（Banin el al.(2002)）。
一般的な異性体とは異なる立体異性体（DもしくはL）は、アポストロフィー(‘)で表されます。一般的な型とは異なるリングサイズ（フラノースもしくはピラノース）の単糖は、キャレット(^)で表されます。
上記の両方にあてはまらない単糖は、チルダ(~)で表されます。';
//↑★Stereoisomersの前にbulletが必要。list要素？
$Structures_StructureSearch_BottomFigure[5] = '
TABLE 1.3 :Linear Code® フォーマットで使用される一般的な単糖のリスト
<table cellspacing="2" cellpadding="3">
  <tr style="background:#eeeeee">
    <th>Modification Type</th>
    <th>Linear Code&reg</th>
  </tr>
  <tr>
    <td>deacetylated N-acetyl</td>
    <td>Q</td>
  </tr>
  <tr>
    <td>ethanolaminephosphate</td>
    <td>PE</td>
  </tr>
  <tr>
    <td>inositol</td>
    <td>IN</td>
  </tr>
  <tr>
    <td>methyl</td>
    <td>ME</td>
  </tr>
  <tr>
    <td>N-acetyl</td>
    <td>N</td>
  </tr>
  <tr>
    <td>O-acetyl</td>
    <td>T</td>
  </tr>
  <tr>
    <td>phosphate</td>
    <td>P</td>
  </tr>
  <tr>
    <td>phosphocholine</td>
    <td>PC</td>
  </tr>
    <tr>
    <td>pyruvate</td>
    <td>PYR</td>
  </tr>
  <tr>
    <td>sulfate</td>
    <td>S</td>
  </tr>
  <tr>
    <td>sulfide</td>
    <td>SH</td>
  </tr>
  <tr>
    <td>2-aminoethylphosphonic acid</td>
    <td>EP</td>
  </tr>
</table>

Example of GlycoMinds(Linear Code®):<pre>
   GNb2(Ab4GNb4)Ma3(Ab4GNb2(Fa3(Ab4)GNb6)Ma6)Mb4GNb4GN </pre>';
//↑★N-acetyl, O-acetylのN,Oのフォントを斜体にする必要あり
$Structures_StructureSearch_BottomTitle[6] = 'BCSDB';
$Structures_StructureSearch_Bottom[6] = 'Bacterial Carbohydrate Structure Database（BCSDB)フォーマットは、糖質や誘導体構造を単線でコード化するためにBCSDBデータベースで使用されています。残基は<res>(<c1>-<c2>)フォーマットで記述されます。resは残基物の名称およびその配置です。c1とc2は残基resがその親にリンクすることによって、それぞれ子と親の炭素数に相当します。';
 $Structures_StructureSearch_BottomFigure[6] = '<br>
BCSDBフォーマットの例：ポリマーの科学反復単位<pre>
 		
a-D-GlcpA-(1-3)-+          
                |          
-3)-a-D-Glcp-(1-4)-b-D-Manp-(1-4)-b-D-Glcp-(1-
</pre>';
$Structures_StructureSearch_BottomTitle[7] = 'LINUCS';
$Structures_StructureSearch_Bottom[7] = 'The LInear Notation for Unique description of Carbohydrate Sequences （LINUCS）フォーマットはextended IUPACフォーマットに基づいていますが、枝分かれの優先度を明確にするための追加ルールがあります。この方法では、構造を記述するために必要な情報を全て保持しながら糖質構造を独特に明確にすることが出来ます。
LINUCSは2つの角括弧[]で始まります。そして、角括弧内の根残基の名称が続きます。もし残基に単一の子がある場合、角括弧に囲まれた括弧の子の連鎖は、角括弧にある子の残基名と配置（IUPACフォーマットのように）の前にきます。
もし残基に1つ以上の子がある場合、それぞれの子の枝は波括弧{}に囲まれます。
子は炭素数を親に連鎖させ、1-3連鎖の子は1-4連鎖の子より前にくるなどのように、炭素数順にリスト化されます。';
$Structures_StructureSearch_BottomFigure[7] = '<br>
LINUCSの例：LINUCSフォーマットで表した糖鎖構造.
<pre>
    [][Asn]{
      [(4+1)][b-D-GlcpNAc]{
        [(4+1)][b-D-GlcpNAc]{
          [(4+1)][b-D-Manp]{
            [(3+1)][a-D-Manp]{
              [(2+1)][a-D-Manp]{
                [(2+1)][a-D-Manp]{}
                }
              }
            [(6+1)][a-D-Manp]{
              [(3+1)][a-D-Manp]{
              	[(2+1)][a-D-Manp]{}
                }
              [(6+1)][a-D-Manp]{
                [(2+1)][a-D-Manp]{}
                }
              }
            }
          }
        }
      }  	
</pre>
'; 
//↑★(3+1),(6+1)に下線が必要
$Structures_StructureSearch_BottomTitle[8] = 'KCF';
$Structures_StructureSearch_Bottom[8] = '糖鎖構造を表すためのKEGG　Chemical Function（KCF）フォーマットは、最初は名前のとおりKEGGで化学構造を表すために使用されました。KCFは、nodeは単糖、edgeはグリコシド結合とするグラフ記号を使用します。　したがって糖鎖を表すには、少なくとも3つのセクションが必要です。3つのセクションは、ENTRY、NODE、EDGEで、最後は3つの斜線「///」で終わります。';
//↑★●、○の入力方法要確認
$insert =  htmlspecialchars ('num<donor node#>:<anomeric configuration (a or b)><donor carbon#> <acceptor node#>:<acceptor carbon#>');
$Structures_StructureSearch_BottomFigure[8] = '
<ul><li>ENTRYセクションは1行で構成されており、構造の名前を特定した後にキーワード糖鎖が続きます。
<li>NODEセクションは複数行で構成されています。最初の行は、単糖もしくはアグリコン要素の数を含みます。また、次の行以降は、続き番号でそれら要素の詳細を含みます。各行ごとに単糖名を特定し、2次元平面で描くために単糖のx座標、y座標を特定しなければなりません。
<li>EDGEセクションも複数行で構成されています。最初の行は結合数（通常はNODE数より1つ少ない）を含み、その後に結合情報の詳細が続きます。結合情報のフォーマットは次のとおりです。:
<br><br><ul><li>'.$insert.'</ul><br>
KCFフォーマットの例： KCFフォーマットで表したN-グリカンコア構造
<pre>
  ENTRY     XYZ          Glycan
  NODE      5     
            1     GlcNAc     15.0     7.0
            2     GlcNAc      8.0     7.0
            3     Man         1.0     7.0
            4     Man        -6.0    12.0
            5     Man        -6.0     2.0
  EDGE      4
            1     2:b1       1:4
            2     3:b1       2:4
            3     5:al       3:3
            4     4:al       3:6
  ///
</pre>
';
//↑★数字の位置調整が必要
// 9. OGBI motif
// 10. IUPAC Condensed
// The International Union of Pure and Applied Chemistry (IUPAC) code specified has specified the “Nomenclature of Carbohydrates” to uniquely describe complex oligosaccharides based on a three-letter code to represent monosaccharides. The long carbohydrate sequences can be adequately described in abbreviated form using a sequence of letters.
//
// 11. IUPAC short version1/
//
// 12. IUPAC short version2
// ';
// ↑★随時追加予定
// Structure Search End

// Composition Search Start
$Structures_SearchComp_Title = '組成検索';
$Structures_SearchComp_Top = ' 組成検索は、各構成成分の最小および最大の要件を満たす構造を見つけます。';
$Structures_SearchComp_Left = '';
// Composition Search End

// Motif List Start
$Motifs_ListAll_Title = 'モチーフリスト';
$Motifs_ListAll_Top = 'モチーフは糖鎖でよく見られる共通構造パターンです。これはレポジトリに登録されている全モチーフのリストです。モチーフを一緒にグループ化するためにつけたラベルをタグと呼びます。';
// Motif List End

//Preferences
$Preferences_Index_Title='プリファレンス';

$Preferences_Index_TopTitle[0] = '糖鎖のグラフ表示の変更';
$Preferences_Index_Top[0] = 'イメージ表示法の選択';

$Preferences_Index_TopTitle[1] = '言語';
$Preferences_Index_Top[1] = '';
?>
