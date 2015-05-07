    <!-- Restricting item type Glycan  -->
    <div ex:role="collection" ex:itemTypes="Glycan"></div>

    <h1>Glycan List</h1><br />
    <table width="100%">
        <tr valign="top">

            <!-- Facet  -->
            <td width="20%">

                <!-- <b>Search</b><br /> -->

                <!-- Mass Slider -->
                <div ex:role="facet"
                  ex:facetClass="Slider"
                  ex:expression=".mass"
                  ex:horizontal="true"
                  ex:precision="100"
                  ex:histogram="true"
                  ex:facetLabel="Range of the Mass">
                </div>
                <br />

                <!-- Tag facet -->
                <div ex:role="facet"  
                  ex:expression=".tag" 
                  ex:height="300px" 
                  ex:sortMode="value"
                  ex:showMissing="true"
                  ex:scroll="false"
                  ex:collapsed="false"
                  ex:missingLabel="other" 
                  ex:facetLabel="Tag"></div>
                <br />

                <!-- Motif name facet -->
                <div ex:role="facet"  
                  ex:expression=".motif" 
                  ex:height="72px" 
                  ex:sortMode="value"
                  ex:showMissing="true"
                  ex:scroll="false"
                  ex:collapsed="false"
                  ex:missingLabel="other" 
                  ex:facetLabel="Motif"></div>
                <br />
            </td>

            <!-- Tiles and Table -->
            <td ex:role="viewPanel">

                <!-- Tiles -->
                <div ex:role="view" 
                     ex:label="List"  
                     ex:orders=".mass"
                     ex:possibleOrders=".mass, .dateEntered, .contributor"
                     ex:grouped="false" 
                     ex:showAll="false" 
                     ex:paginate='true'
                     ex:showToolbox='false'
                     ex:abbreviatedCount="10"></div>
                <table ex:role="lens" class="glycanlist">
                  <tr>
                    <td>
                      <div ex:if-exists=".accessionNumber">Accession Number :
                        <!-- <a ex:href-content="concat('<?php //echo $domain; ?>/Structures/glycans/', .accessionNumber )" target="_blank"> -->
                        <a ex:href-content="concat('/Structures/Glycans/', .accessionNumber )" target="_blank">
                          <span ex:content=".accessionNumber"></span>
                        </a>
                      </div>
                    </td>
                  <tr>
                    <td><div ex:if-exists=".imageURL">
                          Image : <img ex:src-content=".imageURL" />
                        </div>
                    </td>
                  </tr>
                  <tr>
                    <td><div ex:if-exists=".mass">
                          <span>Mass : <span ex:content=".mass"></span></span>
                        </div>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <div ex:if-exists=".motif">
                        <span>Motif : <span ex:content=".motif"></span></span>
                        </a>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <div ex:if-exists=".tag">
                        <span>Classification : <span ex:content=".tag"></span></span>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td><div ex:if-exists=".contributor">
                          <span>Contributor : <span ex:content=".contributor"></span></span>
                        </div>
                    </td>
                  </tr>
                  <tr>
                    <td><div ex:if-exists=".dateEntered">
                          <span>Contribution time : <span ex:content=".dateEntered"></span></span>
                        </div>
                    </td>
                  </tr>
                </table>


                <!-- Table -->
                <div ex:role="exhibit-view"
                     ex:viewClass="Tabular"
                     ex:label="Structure"
                     ex:columns=".imageURL, .mass"
                     ex:columnLabels="Accession Number, GlycoCT"
                     ex:Formats="image, list "
                     ex:sortColumn="1"
                     ex:sortAscending="true"
                     ex:paginate="true"
                     ex:showToolbox='false'
                     >
                    <table class="glycantable">
                      <tr>
                        <td><a ex:href-content="concat('/Structures/Glycans/', .accessionNumber )" target="_blank">
                          <span ex:content=".accessionNumber"></span></a></td>
                        <td><img ex:src-content=".imageURL" /><br/><pre ex:content=".structure"></pre></td>
                      </tr>
                    </table>
                </div>

            </td>



            <!-- Facet  -->
            <td width="20%">

                <!-- Composition facet -->
  
               <!-- Number of Fuc -->
                <div ex:role="facet"
                  ex:facetClass="Slider"
                  ex:expression=".numberOfFuc"
                  ex:horizontal="true"
                  ex:precision="1"
                  ex:histogram="true"
                  ex:facetLabel="Number of Fuc">
                </div>

                <!-- Number of Gal -->
                <div ex:role="facet"
                  ex:facetClass="Slider"
                  ex:expression=".numberOfGal"
                  ex:horizontal="true"
                  ex:precision="1"
                  ex:histogram="true"
                  ex:facetLabel="Number of Gal">
                </div>

                <!-- Number of GalNAc -->
                <div ex:role="facet"
                  ex:facetClass="Slider"
                  ex:expression=".numberOfGalNAc"
                  ex:horizontal="true"
                  ex:precision="1"
                  ex:histogram="true"
                  ex:facetLabel="Number of GalNAc">
                </div>


                <!-- Number of Glc -->
                <div ex:role="facet"
                  ex:facetClass="Slider"
                  ex:expression=".numberOfGlc"
                  ex:horizontal="true"
                  ex:precision="1"
                  ex:histogram="true"
                  ex:collapsed="true"
                  ex:facetLabel="Number of Glc">
                </div>


                <!-- Number of GlcNAc -->
                <div ex:role="facet"
                  ex:facetClass="Slider"
                  ex:expression=".numberOfGlcNAc"
                  ex:horizontal="true"
                  ex:precision="1"
                  ex:histogram="true"
                  ex:facetLabel="Number of GlcNAc">
                </div>

                <!-- Number of Man -->
                <div ex:role="facet"
                  ex:facetClass="Slider"
                  ex:expression=".numberOfMan"
                  ex:horizontal="true"
                  ex:precision="1"
                  ex:histogram="true"
                  ex:facetLabel="Number of Man">
                </div>

                <!-- Number of NeuAc -->
                <div ex:role="facet"
                  ex:facetClass="Slider"
                  ex:expression=".numberOfNeuAc"
                  ex:horizontal="true"
                  ex:precision="1"
                  ex:histogram="true"
                  ex:facetLabel="Number of NeuAc">
                </div>

                <!-- Number of IdoA -->
                <div ex:role="facet"
                  ex:facetClass="Slider"
                  ex:expression=".numberOfIdoA"
                  ex:horizontal="true"
                  ex:precision="1"
                  ex:histogram="true"
                  ex:facetLabel="Number of IdoA">
                </div>

                <!-- Number of Kdn -->
                <div ex:role="facet"
                  ex:facetClass="Slider"
                  ex:expression=".numberOfKdn"
                  ex:horizontal="true"
                  ex:precision="1"
                  ex:histogram="true"
                  ex:facetLabel="Number of Kdn">
                </div>

                <!-- Number of ManNAc -->
                <div ex:role="facet"
                  ex:facetClass="Slider"
                  ex:expression=".numberOfManNAc"
                  ex:horizontal="true"
                  ex:precision="1"
                  ex:histogram="true"
                  ex:facetLabel="Number of ManNAc">
                </div>

                <!-- Number of NeuGc -->
                <div ex:role="facet"
                  ex:facetClass="Slider"
                  ex:expression=".numberOfNeuGc"
                  ex:horizontal="true"
                  ex:precision="1"
                  ex:histogram="true"
                  ex:facetLabel="Number of NeuGc">
                </div>

                <!-- Number of Xyl -->
                <div ex:role="facet"
                  ex:facetClass="Slider"
                  ex:expression=".numberOfXyl"
                  ex:horizontal="true"
                  ex:precision="1"
                  ex:histogram="true"
                  ex:facetLabel="Number of Xyl">
                </div>

                <!-- Number of GalN -->
                <div ex:role="facet"
                  ex:facetClass="Slider"
                  ex:expression=".numberOfGalN"
                  ex:horizontal="true"
                  ex:precision="1"
                  ex:histogram="true"
                  ex:facetLabel="Number of GalN">
                </div>

                <!-- Number of GalA -->
                <div ex:role="facet"
                  ex:facetClass="Slider"
                  ex:expression=".numberOfGalA"
                  ex:horizontal="true"
                  ex:precision="1"
                  ex:histogram="true"
                  ex:facetLabel="Number of GalA">
                </div>

                <!-- Number of GlcN -->
                <div ex:role="facet"
                  ex:facetClass="Slider"
                  ex:expression=".numberOfGlcN"
                  ex:horizontal="true"
                  ex:precision="1"
                  ex:histogram="true"
                  ex:collapsed="true"
                  ex:facetLabel="Number of GlcN">
                </div>

                <!-- Number of GlcA -->
                <div ex:role="facet"
                  ex:facetClass="Slider"
                  ex:expression=".numberOfGlcA"
                  ex:horizontal="true"
                  ex:precision="1"
                  ex:histogram="true"
                  ex:facetLabel="Number of GlcA">
                </div>
                
                <!-- Number of ManN -->
                <div ex:role="facet"
                  ex:facetClass="Slider"
                  ex:expression=".numberOfManN"
                  ex:horizontal="true"
                  ex:precision="1"
                  ex:histogram="true"
                  ex:facetLabel="Number of ManN">
                </div>

                <!-- Number of ManA -->
                <div ex:role="facet"
                  ex:facetClass="Slider"
                  ex:expression=".numberOfManA"
                  ex:horizontal="true"
                  ex:precision="1"
                  ex:histogram="true"
                  ex:facetLabel="Number of ManA">
                </div>


            </td>
        </tr>
    </table>
