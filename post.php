<?php include_once 'inc/header.php'; ?>

<?php 
include_once 'lib/session.php';
$id = Session::get("agentId");

 ?>

 <?php 

include_once 'classes/property.php';
$prty = new Property();

  ?>
 <div class="main">
    <div class="content">
    	<div class="section group">
        <?php 

        if (isset($agentProperty)) {
            echo $agentProperty;
        }
         ?>
    	<div class="box round first grid">
        <h2>Add New Properties</h2>
        <div class="block">
<?php 

if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])) {
    $agentProperty = $prty->agentPropertyData($_POST,$_FILES,$id);
}

 ?>                       
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Name</label>
                    </td>
                    <td>
                        <input type="text" name="name" placeholder="Enter Properties Name..." class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Address</label>
                    </td>
                    <td>
                        <input type="text" name="address" placeholder="Enter Properties Address..." class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Monthly Charge</label>
                    </td>
                    <td>
                        <input type="text" name="charge" placeholder="Enter Properties Space..." class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Space</label>
                    </td>
                    <td>
                        <input type="text" name="space" placeholder="Enter Properties Space..." class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Floor</label>
                    </td>
                    <td>
                        <input type="text" name="floor" placeholder="Number of Floor" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Garages</label>
                    </td>
                    <td>
                        <input type="text" name="garage" placeholder="Number of Garages" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Beds</label>
                    </td>
                    <td>
                        <input type="text" name="bed" placeholder="Number of Beds" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Baths</label>
                    </td>
                    <td>
                        <input type="text" name="bath" placeholder="Number of Baths" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Belcony</label>
                    </td>
                    <td>
                        <input type="text" name="belcony" placeholder="Number of Brelcony" class="medium" />
                    </td>
                </tr>

				
				 <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Description</label>
                    </td>
                    <td>
                        <textarea name="description" cols="30" rows="10"></textarea>
                        <script type="text/javascript">
							if ( typeof CKEDITOR == 'undefined' )
							{
								document.write(
									'<strong><span style="color: #ff0000">Error</span>: CKEditor not found</strong>.' +
									'This sample assumes that CKEditor (not included with CKFinder) is installed in' +
									'the "/ckeditor/" path. If you have it installed in a different place, just edit' +
									'this file, changing the wrong paths in the &lt;head&gt; (line 5) and the "BasePath"' +
									'value (line 32).' ) ;
							}
							else
							{
								var editor = CKEDITOR.replace( 'description' );
								//editor.setData( '<p>Just click the <b>Image</b> or <b>Link</b> button, and then <b>&quot;Browse Server&quot;</b>.</p>' );
							} 
						</script>
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <label>Upload Cover Image</label>
                    </td>
                    <td>
                        <input type="file" name="image" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Images For Gallery</label>
                    </td>
                    <td>
                        <input type="file" name="gimage[]" multiple>
                    </td>
                </tr>
				

				<tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Save" />
                    </td>
                </tr>
            </table>
            </form>
        </div>
    </div>
    	</div>
    </div>
 </div>



<?php include_once 'inc/footer.php'; ?>

