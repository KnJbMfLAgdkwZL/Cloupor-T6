<div class="Content">
    <?php
    $str = "
               <table class='table table-striped table-hover '>
               <thead>
               <tr>
               <th>#</th>
               <th>Name</th>
               <th>Lastname</th>
               <th>Support</th>
               <th>DOB</th>
               <th>Sex</th>
               <th>Street</th>
               <th>App</th>
               <th>Zip</th>
               <th>DHL Office</th>
               <th>E-mail</th>
               <th>Skype/icq</th>
               <th>Phone</th>
               <th>Scans</th>
               <th>Date start</th>
               <th>Date Finish</th>
               <th>Pay comment</th>
               <th>Staff comment</th>
               <th>Status</th>
            </tr>
        </thead>
               <tbody>";
    foreach($Couriers as $key=>$val)
    {
            $val['DOB'] = date('m/d/Y', $val['DOB']);
            $val['Start_Date'] = date('m/d/Y', $val['Start_Date']);
            $val['Finish_Date'] = date('m/d/Y', $val['Finish_Date']);
        $str .= "
               <tr id='{$val['Id']}' class='Couriers'>
               <th>{$val['Id']}</th>
               <th>{$val['Name']}</th>
               <th>{$val['Lastname']}</th>
               <th>{$val['Support']}</th>
               <th>{$val['DOB']}</th>
               <th>{$val['Sex']}</th>
               <th>{$val['Street']}</th>
               <th>{$val['Appartment']}</th>
               <th>{$val['Zip']}</th>
               <th>{$val['DHL_Office']}</th>
               <th>{$val['Email']}</th>
               <th>{$val['Skype_ICQ']}</th>
               <th>{$val['Phone']}</th>
               <th>SCANS</th>
               <th>{$val['Start_Date']}</th>
               <th>{$val['Finish_Date']}</th>
               <th>{$val['Pay_Comment']}</th>
               <th>{$val['Staff_Comment']}</th>
               <th>{$val['Status']}</th>
            </tr>";
    }
    $str .= "
        </tbody>
    </table>";
    if(MainController::NotEmpty($Couriers))
    {
        print $str;
    }
    ?>
    
</div>








<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
<script>
    $(document).ready(function ()
    {
        $('#DOB, #Start_Date, #Finish_Date').datepicker();
        $('.close, .btnclose').click(function ()
        {
            $('.modal').css('display', 'none');
        });
    });
</script>
<style>
    .form-group
    {
        width: 300px;
        display: inline-block;
    }
    .text_com
    {
        width: 450px;
    }
    .text_area
    {
        resize: none;
    }
    .modal-dialog
    {
        width: 900px;
    }
</style>
<form class="form-horizontal" method="post">
    <input type="hidden" id="action" name="action" value="CourierInsert" />
    <!--<div class=" modal" style="display: inline;">-->
    <div class=" modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Add Courier</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="Name" name="Name" placeholder="Name">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="Lastname" name="Lastname" placeholder="Lastname">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-10">
                            <select class="form-control" id="Support" name="Support">
                                <option selected="selected" style="display:none;" value="-1">Chose Support</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="DOB" name="DOB" placeholder="Date of birth">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-10">
                            <select class="form-control" id="Sex" name="Sex">
                                <option selected="selected" style="display:none;" value="-1">Chose Sex</option>
                                <option value="0">Woman</option>
                                <option value="1">Mann</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="Email" name="Email" placeholder="e-mail">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="Country" name="Country" placeholder="Country">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="City" name="City" placeholder="City">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="Street" name="Street" placeholder="Street">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="Appartment" name="Appartment" placeholder="Appartment">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="Zip" name="Zip" placeholder="Zip code">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="DHL_Office" name="DHL_Office" placeholder="DHL Office">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="Skype_ICQ" name="Skype_ICQ" placeholder="Skype/ICQ">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="Phone" name="Phone" placeholder="Phone">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-10">
                            <select class="form-control" id="Status" name="Status">
                                <option selected="selected" style="display:none;" value="-1">Status</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="Scan_ID" name="Scan_ID" placeholder="Scan of ID">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="Scan_Registration" name="Scan_Registration" placeholder="Scan of Registration">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="Scan_Agreement" name="Scan_Agreement" placeholder="Scan of Agreement">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="Start_Date" name="Start_Date" placeholder="Start Date">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="Finish_Date" name="Finish_Date" placeholder="Finish Date">
                        </div>
                    </div>
                    <br />
                    <div class="form-group text_com">
                        <div class="col-lg-10">
                            <textarea class="form-control text_area" rows="6" id="Pay_Comment" name="Pay_Comment" placeholder="Pay Comment"></textarea>
                        </div>
                    </div>
                    <div class="form-group text_com">
                        <div class="col-lg-10">
                            <textarea class="form-control text_area" rows="6" id="Staff_Comment" name="Staff_Comment" placeholder="Staff Comment"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btnclose" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</form>