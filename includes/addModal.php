<div class="container">    
    <div class="modal fade" id="modalForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
            <!-- Modal Header -->
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Add Contact</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                </div>
                <!-- Modal Body -->
                <form class="create-main" action="./create.php" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <input autofocus required class="form-control form-control-lg capital" placeholder="First Name" name="firstname" type="text">  
                        </div>
                        <div class="form-group">                               
                            <input required class="form-control form-control-lg capital" placeholder="Middle Initial" maxlength="2" name="middleinitial" type="text">  
                        </div>
                        <div class="form-group">                                    
                            <input required class="form-control form-control-lg capital" placeholder="Last Name" name="lastname" type="text">  
                        </div>
                        <div class="form-group">                                   
                            <input required class="form-control form-control-lg capital" placeholder="Address" name="address" type="text">  
                        </div>
                        <div class="form-group">                                     
                            <input required class="form-control form-control-lg capital" placeholder="Contact Number" name="contactnumber" type="number">  
                        </div>
                    </div>
                    <!-- Modal Footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" name="newcontact" class="btn btn-default">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>