    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>

     <!-- orders page script  -->
     <script>
    $("#costume").click(function () {
        $days = $("#days").val();
        // console.log($days); 
        location.replace("orders.php?action=view-orders&order=costume&days=" + $days);
    });
    </script>  
</body>

</html>