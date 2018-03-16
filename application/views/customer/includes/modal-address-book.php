
<!--ADD ADDRESS BOOK MODAL-->
<?php foreach ($customers as $customer) { ?>  
<div class="modal fade modal" id="add-address-book" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add New Address</h4>
            </div>
            <form method="post" action="<?php echo base_url()?>profile/add_address_book?id=<?php echo $customer->customer_id; ?>">
                 <input type="text" id="fake-id2" name="product-id" readonly hidden>
            <div class="modal-body">
                <div class="form-group">
                    <label>Street</label>
                    <input type="text"  name="street" class="form-control">
                </div>
                <div class="form-group">
                    <label>City</label>
                    <input type="text"  name="city" class="form-control">
                </div>
                <div class="form-group">
                    <label>State/Province</label>
                    <select class="form-control" name="state">
                        <option value="Abra">Abra</option>
                        <option value="Agusan del Norte">Agusan del Norte</option>
                        <option value="Agusan del Sur">Agusan del Sur</option>
                        <option value="Aklan">Aklan</option>
                        <option value="Albay">Albay</option>
                        <option value="Antique">Antique</option>
                        <option value="Apayao">Apayao</option>
                        <option value="Aurora">Aurora</option>
                        <option value="Basilan">Basilan</option>
                        <option value="Bataan">Bataan</option>
                        <option value="Batanes">Batanes</option>
                        <option value="Batangas">Batangas</option>
                        <option value="Benguet">Benguet</option>
                        <option value="Biliran">Biliran</option>
                        <option value="Bohol">Bohol</option>
                        <option value="Bukidnon">Bukidnon</option>
                        <option value="Bulacan">Bulacan</option>
                        <option value="Cagayan">Cagayan</option>
                        <option value="Camarines Norte">Camarines Norte</option>
                        <option value="Camarines Sur">Camarines Sur</option>
                        <option value="Camiguin">Camiguin</option>
                        <option value="Capiz">Capiz</option>
                        <option value="Catanduanes">Catanduanes</option>
                        <option value="Cavite">Cavite</option>
                        <option value="Cebu">Cebu</option>
                        <option value="Compostella Valley">Compostella Valley</option>
                        <option value="Cotabato">Cotabato</option>
                        <option value="Davao del Norte">Davao del Norte</option>
                        <option value="Davao del Sur">Davao del Sur</option>
                        <option value="Davao Oriental">Davao Oriental</option>
                        <option value="Dinagat Islands">Dinagat Islands</option>
                        <option value="Eastern Samar">Eastern Samar</option>
                        <option value="Guimaras">Guimaras</option>
                        <option value="Ifugao">Ifugao</option>
                        <option value="Ilocos Norte">Ilocos Norte</option>
                        <option value="Ilocos Sur">Ilocos Sur </option>
                        <option value="Ilo-Ilo">Ilo-Ilo</option>
                        <option value="Isabela">Isabela</option>
                        <option value="Kalinga">Kalinga</option>
                        <option value="La Union">La Union</option>
                        <option value="Laguna">Laguna</option>
                        <option value="Lanao del Norte">Lanao del Norte</option>
                        <option value="Lanao del Sur">Lanao del Sur</option>
                        <option value="Leyte">Leyte</option>
                        <option value="Maguindanao">Maguindanao</option>
                        <option value="Marinduque">Marinduque</option>
                        <option value="Masbate">Masbate</option>
                        <option value="Metro Manila">Metro Manila</option>
                        <option value="Misamis Occidental">Misamis Occidental</option>
                        <option value="Misamis Oriental">Misamis Oriental</option>
                        <option value="Mountain Province">Mountain Province</option>
                        <option value="Negros Occidental">Negros Occidental</option>
                        <option value="Negros Oriental">Negros Oriental</option>
                        <option value="Northern Samar">Northern Samar</option>
                        <option value="Nueva Ecija">Nueva Ecija</option>
                        <option value="Nueva Vizcaya">Nueva Vizcaya </option>
                        <option value="Occidental Mindoro">Occidental Mindoro</option>
                        <option value="Oriental Mindoro">Oriental Mindoro</option>
                        <option value="Palawan">Palawan</option>
                        <option value="Pampanga">Pampanga</option>
                        <option value="Pangasinan">Pangasinan</option>
                        <option value="Quezon">Quezon</option>
                        <option value="Quirino">Quirino</option>
                        <option value="Rizal">Rizal</option>
                        <option value="Romblon">Romblon</option>
                        <option value="Samar">Samar</option>
                        <option value="Sarangani">Sarangani</option>
                        <option value="Shariff Kabunsuan">Shariff Kabunsuan</option>
                        <option value="Siquijor">Siquijor</option>
                        <option value="Sorsogon">Sorsogon</option>
                        <option value="South Cotabato">South Cotabato</option>
                        <option value="Southern Leyte">Southern Leyte</option>
                        <option value="Sultan Kudara">Sultan Kudarat</option>
                        <option value="Sulu">Sulu</option>
                        <option value="Surigao del Norte">Surigao del Norte</option>
                        <option value="Surigao del Sur">Surigao del Sur</option>
                        <option value="Tarlac">Tarlac</option>
                        <option value="Tawi - Tawi">Tawi - Tawi</option>
                        <option value="Zambales">Zambales</option>
                        <option value="Zamboanga del Norte">Zamboanga del Norte</option>
                        <option value="Zamboanga del Sur">Zamboanga del Sur</option>
                        <option value="Zamboanga Sibugay">Zamboanga Sibugay</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Zip code</label>
                    <input type="text"  name="zip"class="form-control">
                </div>
                <div class="form-group">
                    <label>Country</label>
                    <input type="text"  name="country"class="form-control" value="Philippines" readonly>
                </div>
            </div>            
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Add Address</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
            </form>
        </div>
    </div>
</div>
<?php } ?>

<!--EDIT ADDRESS BOOK MODAL-->
<?php foreach ($customers as $customer) { ?>  
<div class="modal fade modal" id="edit-address-book" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit Address</h4>
            </div>
            <form method="post" action="<?php echo base_url()?>profile/update_address_book?id=<?php echo $customer->customer_id; ?>">
                 <input type="text" name="address-id" id="ajax-id" hidden>
            <div class="modal-body">
                
                <div class="form-group">
                    <label>Street</label>
                    <input type="text"  name="street" class="form-control" id="ajax-street">
                </div>
                <div class="form-group">
                    <label>City</label>
                    <input type="text"  name="city" class="form-control" id="ajax-city">
                </div>
                <div class="form-group">
                    <label>State/Province</label>
                    <select class="form-control" name="state" id="ajax-state">
                        <option value="Abra">Abra</option>
                        <option value="Agusan del Norte">Agusan del Norte</option>
                        <option value="Agusan del Sur">Agusan del Sur</option>
                        <option value="Aklan">Aklan</option>
                        <option value="Albay">Albay</option>
                        <option value="Antique">Antique</option>
                        <option value="Apayao">Apayao</option>
                        <option value="Aurora">Aurora</option>
                        <option value="Basilan">Basilan</option>
                        <option value="Bataan">Bataan</option>
                        <option value="Batanes">Batanes</option>
                        <option value="Batangas">Batangas</option>
                        <option value="Benguet">Benguet</option>
                        <option value="Biliran">Biliran</option>
                        <option value="Bohol">Bohol</option>
                        <option value="Bukidnon">Bukidnon</option>
                        <option value="Bulacan">Bulacan</option>
                        <option value="Cagayan">Cagayan</option>
                        <option value="Camarines Norte">Camarines Norte</option>
                        <option value="Camarines Sur">Camarines Sur</option>
                        <option value="Camiguin">Camiguin</option>
                        <option value="Capiz">Capiz</option>
                        <option value="Catanduanes">Catanduanes</option>
                        <option value="Cavite">Cavite</option>
                        <option value="Cebu">Cebu</option>
                        <option value="Compostella Valley">Compostella Valley</option>
                        <option value="Cotabato">Cotabato</option>
                        <option value="Davao del Norte">Davao del Norte</option>
                        <option value="Davao del Sur">Davao del Sur</option>
                        <option value="Davao Oriental">Davao Oriental</option>
                        <option value="Dinagat Islands">Dinagat Islands</option>
                        <option value="Eastern Samar">Eastern Samar</option>
                        <option value="Guimaras">Guimaras</option>
                        <option value="Ifugao">Ifugao</option>
                        <option value="Ilocos Norte">Ilocos Norte</option>
                        <option value="Ilocos Sur">Ilocos Sur </option>
                        <option value="Ilo-Ilo">Ilo-Ilo</option>
                        <option value="Isabela">Isabela</option>
                        <option value="Kalinga">Kalinga</option>
                        <option value="La Union">La Union</option>
                        <option value="Laguna">Laguna</option>
                        <option value="Lanao del Norte">Lanao del Norte</option>
                        <option value="Lanao del Sur">Lanao del Sur</option>
                        <option value="Leyte">Leyte</option>
                        <option value="Maguindanao">Maguindanao</option>
                        <option value="Marinduque">Marinduque</option>
                        <option value="Masbate">Masbate</option>
                        <option value="Metro Manila">Metro Manila</option>
                        <option value="Misamis Occidental">Misamis Occidental</option>
                        <option value="Misamis Oriental">Misamis Oriental</option>
                        <option value="Mountain Province">Mountain Province</option>
                        <option value="Negros Occidental">Negros Occidental</option>
                        <option value="Negros Oriental">Negros Oriental</option>
                        <option value="Northern Samar">Northern Samar</option>
                        <option value="Nueva Ecija">Nueva Ecija</option>
                        <option value="Nueva Vizcaya">Nueva Vizcaya </option>
                        <option value="Occidental Mindoro">Occidental Mindoro</option>
                        <option value="Oriental Mindoro">Oriental Mindoro</option>
                        <option value="Palawan">Palawan</option>
                        <option value="Pampanga">Pampanga</option>
                        <option value="Pangasinan">Pangasinan</option>
                        <option value="Quezon">Quezon</option>
                        <option value="Quirino">Quirino</option>
                        <option value="Rizal">Rizal</option>
                        <option value="Romblon">Romblon</option>
                        <option value="Samar">Samar</option>
                        <option value="Sarangani">Sarangani</option>
                        <option value="Shariff Kabunsuan">Shariff Kabunsuan</option>
                        <option value="Siquijor">Siquijor</option>
                        <option value="Sorsogon">Sorsogon</option>
                        <option value="South Cotabato">South Cotabato</option>
                        <option value="Southern Leyte">Southern Leyte</option>
                        <option value="Sultan Kudara">Sultan Kudarat</option>
                        <option value="Sulu">Sulu</option>
                        <option value="Surigao del Norte">Surigao del Norte</option>
                        <option value="Surigao del Sur">Surigao del Sur</option>
                        <option value="Tarlac">Tarlac</option>
                        <option value="Tawi - Tawi">Tawi - Tawi</option>
                        <option value="Zambales">Zambales</option>
                        <option value="Zamboanga del Norte">Zamboanga del Norte</option>
                        <option value="Zamboanga del Sur">Zamboanga del Sur</option>
                        <option value="Zamboanga Sibugay">Zamboanga Sibugay</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Zip code</label>
                    <input type="text"  name="zip"class="form-control" id="ajax-zip">
                </div>
                <div class="form-group">
                    <label>Country</label>
                    <input type="text"  name="country"class="form-control" id="ajax-country" readonly>
                </div>
            </div>            
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Update Address</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
            </form>
        </div>
    </div>
</div>
<?php } ?>