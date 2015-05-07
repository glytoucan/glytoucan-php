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
$Stanzas_Index_Right = 'GlyTouCan is the web interface for the international glycan structure repository.  This repository is a freely available, uncurated registry for glycan structures that assigns globally unique accession numbers to any glycan independent of the level of information provided by the experimental method used to identify the structure(s). Any glycan structure, ranging in resolution from monosaccharide composition to fully defined structures including glycosidic linkage configuration, can be registered as long as there are no inconsistencies in the structure.

Users can search for glycan structures and motifs that have been registered into this repository.  Registered users can additionally register new glycan structures to obtain unique IDs for each structure, which can be used in publications and other databases upon approval.

The development of this repository is funded by the Integrated Database Project by MEXT (Ministry of Education, Culture, Sports, Science & Technology) and the Program for Coordination Toward Integration of Related Databases by JST (Japan Science and Technology Agency).';
$Stanzas_Index_FootBottom = 'Copyright © 2014 GlyTouCan';
// Home End

// Glycan Registration Start
$Registries_Index_Title ='Glycan Registration';
$Registries_Index_Left = 'Input your glycan structure(s) below in GlycoCT condensed format.';
$Registries_Index_RightTitle = 'Example of GlycoCT condensed format:
                               The glycan containing repeating units in GlycoCT format.';
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
$Structures_StructureSearch_Title = 'Structure Search';
//Left
$Structures_StructureSearch_Left [0] = '';
$Structures_StructureSearch_Left [1] = 'Search type';
$Structures_StructureSearch_Left [2] = 'Search for exact same structure';
$Structures_StructureSearch_Left [3] = 'Search for substructure';
$Structures_StructureSearch_Left [4] = 'Select sequence format :';
$Structures_StructureSearch_Left [5] = 'GlycoCT condensed';
$Structures_StructureSearch_Left [6] = 'CarbBank';
$Structures_StructureSearch_Left [7] = 'GlycoMinds (Linear Code®)';
$Structures_StructureSearch_Left [8] = 'BCSDB';
$Structures_StructureSearch_Left [9] = 'LINUCS';
$Structures_StructureSearch_Left [10] = 'KCF';
//Right
$Structures_StructureSearch_RightTitle [0] = 'Search type';
$Structures_StructureSearch_RightTitle [1] = 'Search for exact same structure';
$Structures_StructureSearch_Right [1] = 'Search for exact same structure with entered glycan structure.';
$Structures_StructureSearch_RightTitle [2] = 'Search for substructure';
$Structures_StructureSearch_Right [2] = 'Search for all substructures that contain entered glycan structure.';
//Bottom
$Structures_StructureSearch_BottomTitle[0] = '';
$Structures_StructureSearch_BottomTitle[1] = 'GlycoCT condensed';
$Structures_StructureSearch_Bottom[1] = 'GlycoCT format is encoding schema for carbohydrate sequences based on a connection table approach to describe carbohydrate sequences.  The format is adopting IUPAC rules to generate a consistent, machine-readable nomenclature using a block concept to describe carbohydrate sequences like repeating units. It consists of two variants, a condensed format and an XML format. The condensed format allows for unique identification of glycan structures in a compact manner.
The monosaccharide naming convention follows the following format: a-bccc-DDD-e : f|g : h, where a is the anomeric configuration (one of a, b, o, x), b is the stereoisomer configuration (one of d, l, x), ccc is the three-letter code for the monosaccharide as listed in Table 1.1, DDD is the base type or superclass indicating the number of consecutive carbon atoms such as HEX, PEN,  NON, e and f indicate the carbon numbers involved in closing the ring, g is the position of the modifier, and h is the type of modifier. For a, b, e, f and g, an x can be used to specify an unknown value. bcc and g : h may also be repeated if necessary. 
It is noted that substituents of monosaccharides are also treated as separate residues attached to the base residue. These substituents are distinguished by specifying one of the base residue. These substituents are distinguished by specifying one of the following codes immediately after the residue number: b=basetype, s=substituent, r=repeating unit, a=alternative unit. The list of substituents handled by GlycoCT is given in Table 1.2.
The GlycoCT format follows something similar to the KCF format, where the residues are specified in a RES section, and the linkage in a LIN section.'; 
$Structures_StructureSearch_BottomFigure[1] = '<br>
TABLE 1.1: List of monosaccharide and their three-letter codes used in GlycoCT.
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
TABLE 1.2: List of substituents used in GlycoCT.
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
Example of GlycoCT: The glycan containing repeating units in GlycoCT format.
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
$Structures_StructureSearch_Bottom[4] = 'IUPAC suggests an extended IUPAC form by which structures are written across multiple lines. This  is the format originally used by CarbBank, thus it is sometimes referred to as such. The representation of monosaccharides is the same as that of IUPAC format, where each monosaccharides residue is preceded by the anomeric descriptor and the configuration symbol and the ring size is indicated by an italic f or p. If any of α/β, D/L, f/p are omitted, it is assumed that this structural detail is unknown.
    This format is may substitute α and β with a and b, respectively. Arrows (→) may also be replaced by hyphens (-)、and up (↑) and down (↓) arrows may be replaced by bars (|).';
$Structures_StructureSearch_BottomFigure[4] = '<pre>
Example of CarbBank format: The N-glycan core structure represented in CarbBank (extended IUPAC) format. 
    a-D-Manp-(1-6)+
                  |
             b-D-Manp-(1-4)-b-D-GlcpNAc-(1-4)-a-D-GlcpNAc
                  |
    a-D-Manp-(1-3)+             
</pre>';//↑★pのフォントは他と異なるため注意
$Structures_StructureSearch_BottomTitle[5] = 'GlycoMinds (Linear Code®)';
$Structures_StructureSearch_Bottom[5] = 'The Carbohydrate format,  GlycoMinds which is also  known as Linear Code®,  uses a single-letter nomenclature for monosaccharides and includes a condensed description of the glycosidic linkages. Monosaccharide representation is based on the common structure of a monosaccharide where modifications to the common structure are indicated by specific symbols, as in the following (Banin el al.(2002)).
 Stereoisomers (D or L) differing from the common isomer are indicated by apostrophe (‘).
Monosaccharides with differing ring size (furanose or pyranose) from the common form are indicated by a caret (^).
Monosaccharides differing in both of the above are indicated by a tilde (~).';
//↑★Stereoisomersの前にbulletが必要。list要素？
$Structures_StructureSearch_BottomFigure[5] = '
TABLE 1.3 : List of common modifications as used in the Linear Code&reg format.
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
$Structures_StructureSearch_Bottom[6] = 'The Bacterial Carbohydrate Structure DataBase(BCSDB) format is used in the BCSDB database to encode carbohydrates and derivative structures in a single line.  
 Residues are described in the format <res>(<c1>-<c2>) where res is the name of the residue and its configuration and c1 and c2 correspond to the carbon numbers of the child and parent, respectively, by which the residue res is linked to its parent.';
 $Structures_StructureSearch_BottomFigure[6] = '<br>
Example of BCSDB format: Chemical repeating unit of polymer.<pre>
 		
a-D-GlcpA-(1-3)-+          
                |          
-3)-a-D-Glcp-(1-4)-b-D-Manp-(1-4)-b-D-Glcp-(1-
</pre>';
$Structures_StructureSearch_BottomTitle[7] = 'LINUCS';
$Structures_StructureSearch_Bottom[7] = 'The LInear Notation for Unique description of Carbohydrate Sequences (LINUCS) format is based on the extended IUPAC format but uses additional rules to define the priority of the branches. In this way, carbohydrate structure can be defined uniquely while still containing all the information required to describe the structure.
 The start of LINUCS format may include two square brackets [], followed by the root residue name in square brackets. If a residue has a single child, then the child’s linkage in parentheses surrounded by square brackets precedes the child’s residue name and configuration (as in IUPAC format) in square brackets. If a residue has more than one child, then each child’s branch is surrounded by curly brackets {}. Children are listed in order of the carbon number linking them to the parent, such that the child with a 1-3 linkage would come before a child with a 1-4 linkage.';
$Structures_StructureSearch_BottomFigure[7] = '<br>
  Example of LINUCS: The glycan structure in LINUCS format.
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
$Structures_StructureSearch_Bottom[8] = 'The KEGG Chemical Function (KCF) format for representing glycan structures was originally used to represent chemical structures (thus the name) in KEGG. KCF uses the graph notation, where nodes are monosaccharides and edges are glycosidic linkages. Thus to represent a glycan, at least three sections are required: ENTRY, NODE, EDGE, followed by three slashes ‘///’ at the end.
';
//↑★●、○の入力方法要確認
$insert =  htmlspecialchars ('num<donor node#>:<anomeric configuration (a or b)><donor carbon#> <acceptor node#>:<acceptor carbon#>');
$Structures_StructureSearch_BottomFigure[8] = '
<ul><li>The ENTRY section consists of one line and may specify a name for the structure followed by the keyword Glycan.
<li>The NODE section consists of several lines. The first line contains the number of monosaccharides or aglycon entities, and the following lines consist of the details of these entities numbered consecutively. For each entity line, the name and x- and y-coordinates (to draw on a 2D plane) must be specified.
<li>Similarly, the EDGE section consists of several lines, the first line containing the number of bonds (usually one less than the number of NODEs), followed by the details of the bond information. The format for the bond information is as follows:
<br><br><ul><li>'.$insert.'</ul><br>
 Example of KCF format: The N-glycan core structure represented in KCF format. 
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
$Structures_SearchComp_Title = 'Composition Search';
$Structures_SearchComp_Top = 'The composition search finds structures that satisfy the minimum and maximum requirements specified for each component.';
$Structures_SearchComp_Left = '';
// Composition Search End

// Motif List Start
$Motifs_ListAll_Title = 'Motif List';
$Motifs_ListAll_Top = 'Motifs are common structural patterns that are often found in glycans.
This is a list of all motifs registered in the repository.
Tags refer to labels attached to motifs to group them together.';
// Motif List End

//Preferences
$Preferences_Index_Title='Preferences';

$Preferences_Index_TopTitle[0] = 'Change the graphical representation of glycan';
$Preferences_Index_Top[0] = 'Select image notation';

$Preferences_Index_TopTitle[1] = 'Language';
$Preferences_Index_Top[1] = '';

?>
