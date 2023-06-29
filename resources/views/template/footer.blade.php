<!-- Footer START -->
<footer class="footer">
    <div class="footer-content">
        <p class="m-b-0">Copyright © 2019 Theme_Nate. All rights reserved.</p>
        <span>
            <a href="" class="text-gray m-r-15">Term &amp; Conditions</a>
            <a href="" class="text-gray">Privacy &amp; Policy</a>
        </span>
    </div>
</footer>
<!-- Footer END -->
<!-- Search Start-->
<!-- <div class="modal modal-left fade search" id="search-drawer">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header justify-content-between align-items-center">
                            <h5 class="modal-title">Search</h5>
                            <button type="button" class="close" data-dismiss="modal">
                                <i class="anticon anticon-close"></i>
                            </button>
                        </div>
                        <div class="modal-body scrollable">
                            <div class="input-affix">
                                <i class="prefix-icon anticon anticon-search"></i>
                                <input type="text" class="form-control" placeholder="Search">
                            </div>
                            COntent
                        </div>
                    </div>
                </div>
            </div> -->
<!-- Search End-->

<!-- Quick View START -->
<!-- <div class="modal modal-right fade quick-view" id="quick-view">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header justify-content-between align-items-center">
                            <h5 class="modal-title">Quick View</h5>
                        </div>
                        <div class="modal-body scrollable">
                            Content Disini
                        </div>
                    </div>
                </div>
            </div> -->
<!-- Quick View END -->
<!-- </div>
    </div> -->


<!-- Core Vendors JS -->
<script src="assets/js/vendors.min.js"></script>

<!-- page js -->
<script src="assets/vendors/datatables/jquery.dataTables.min.js"></script>
<script src="assets/vendors/datatables/dataTables.bootstrap.min.js"></script>
<script src="assets/vendors/select2/select2.min.js"></script>

<!-- Core JS -->
<script src="assets/js/app.min.js"></script>
<script>
    $('#data-table').DataTable();
    $('.select2').select2();

    function showMdlEdit(id, name, course, email, phone) {
        $('#mdlEdit_id').val(id)
        $('#mdlEdit_name').val(name)
        $('#mdlEdit_course').val(course).change()
        $('#mdlEdit_email').val(email)
        $('#mdlEdit_phone').val(phone)

        $('#mdlEdit').modal('show');
    }

    function showMdlDelete(id) {
        $('#mdlDelete_id').val(id)
        $('#mdlDelete').modal('show');
    }
</script>
</body>

</html>