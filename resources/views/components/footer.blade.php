<div id="loading" class="loading-overlay">
    <img src="/assets/img/loading.gif" alt="LOGO">
    
  </div>


              <!-- Footer -->
              <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; {{ Date('Y') }} {{$direction_fr}} {{$ville_fr}}</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>



    <!-- Bootstrap core JavaScript-->
    <script src="/vendor/jquery/jquery.min.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="/js/sb-admin-2.min.js"></script>

    <script type="text/javascript">
    function op_like(value){
        document.getElementById("myDropdown").style.display ="block";
        var input, filter, ul, li, a, i;
        filter = value.toUpperCase();
        a = document.getElementsByClassName("ops_clss");
        for (i = 0; i < a.length; i++) {
            txtValue = a[i].textContent || a[i].innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
            a[i].style.display = "";
            } else {
            a[i].style.display = "none";
            }
        }
    }
    function filter(value){
        var getUrl = window.location;
        //var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
        var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
        console.log(baseUrl);
        if(getUrl.pathname.split('/')[1] =="select"){
            baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1]+"/"+getUrl.pathname.split('/')[2];
        }
        window.location.href = baseUrl+"/"+value;
    }
    window.onload = function(){
        document.getElementById('loading').style.display = "none";
    };
    document.onclick= function(event) {
        if(event.srcElement.id != "op_input"){
            document.getElementById('myDropdown').style.display = "none";
        }
    }
    </script>

</body>

</html>