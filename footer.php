<!-- <div class="footer">

  <div class="footer-inner">

    <div class="container">

      <div class="row">

        <div class="span12">
          &copy; 2013 <a href="">Cooperative Bank of Oromia</a>.
        </div>  /span12 

      </div> /row

    </div> /container

  </div> /footer-inner 

</div> /footer -->

<!-- jQuery -->

<script src="js/jquery.min.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap-datepicker.js"></script>
<!-- Metis Menu Plugin JavaScript -->
<script src="js/metisMenu.min.js"></script>
<script src="/js/dataTables.bootstrap.min.js"></script>
<script src="js/jquery.dataTables.min.js"></script>
<script src="/js/dataTables-responsive.js"></script>
<!-- Morris Charts JavaScript -->
<script src="js/raphael.min.js"></script>
<script src="js/morris.min.js"></script>
<script src="js/morris-data.js"></script>
<!-- Custom Theme JavaScript -->
<script src="js/sb-admin-2.js"></script>

<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.datatables.net/buttons/1.6.4/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.print.min.js"></script>



<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->

<!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->



<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script> -->





<script type="text/javascript">
  $('.date').datepicker({
    format: "dd-mm-yyyy",
    autoclose: true,
    todayHighlight: true,
  });
</script>



<script type="text/javascript">
  $(document).ready(function() {
    $('#dataTables-example').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      // dom: 'Blfrtip',
      "lengthMenu": [
        [10, 25, 50, -1],
        [10, 25, 50, "All"]
      ],
      // dom: 'Blfrtip',
      // buttons: [{
      //     extend: 'excelHtml5',
      //     //title: 'Excel MK',
      //     className: 'btn_excel',
      //     text: 'Export to Excel'
      //   },
      //   {
      //     extend: 'csvHtml5',
      //     // title: 'CSV MK',
      //     className: 'btn_csv',
      //     text: 'Export to CSV'
      //   },
      //   // {
      //   //   extend: 'pdfHtml5',
      //   //   // title: 'PDF MK',
      //   //   className: 'btn_pdf',
      //   //   text: 'Export to PDF'
      //   // },

      // ]

    });

    // $('.btn_pdf').attr("class", "btn btn-danger");
    // $('.btn_csv').attr("class", "btn btn-primary");
    // $('.btn_excel').attr("class", "btn btn-info");

  });
</script>

<script>
  function NewTab() {
    window.open(
      "https://win-6rocs42a9do/Reports/report/Internal_audit/Report%20Summary", "_blank");
  }
</script>
<script>
  function NewQTab() {
    window.open(
      "https://win-6rocs42a9do/Reports/report/Internal_audit/Quarter%20Summary", "_blank");
  }
</script>
<script>
  function NewITab() {
    window.open(
      "https://win-6rocs42a9do/Reports/report/Internal_audit/Introduction%20Letter", "_blank");
  }
</script>
<script>
  function NewFTab() {
    window.open(
      "https://win-6rocs42a9do/Reports/report/Internal_audit/Finding%20Registration", "_blank");
  }
</script>

<script type="text/javascript">
  $(document).ready(function() {
    $('#dataTables-exampleplc').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      // dom: 'Blfrtip',
      "lengthMenu": [
        [10, 25, 50, -1],
        [10, 25, 50, "All"].
        // ],
        // dom: 'Blfrtip',
        // buttons: [{
        //     extend: 'excelHtml5',
        //     //title: 'Excel MK',
        //     className: 'btn_excel',
        //     text: 'Export to Excel'
        //   },
        //   {
        //     extend: 'csvHtml5',
        //     // title: 'CSV MK',
        //     className: 'btn_csv',
        //     text: 'Export to CSV'
        //   },
        //   // {
        //   extend: 'pdfHtml5',
        //   // title: 'PDF MK',
        //   className: 'btn_pdf',
        //   text: 'Export to PDF'
        // },

      ]

    });

    // $('.btn_pdf').attr("class", "btn btn-danger");
    // $('.btn_csv').attr("class", "btn btn-primary");
    // $('.btn_excel').attr("class", "btn btn-info");

  });
</script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#dataTables-eg12').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      // dom: 'Blfrtip',
      "lengthMenu": [
        [10, 25, 50, -1],
        [10, 25, 50, "All"].
        // ],
        // dom: 'Blfrtip',
        // buttons: [{
        //     extend: 'excelHtml5',
        //     //title: 'Excel MK',
        //     className: 'btn_excel',
        //     text: 'Export to Excel'
        //   },
        //   {
        //     extend: 'csvHtml5',
        //     // title: 'CSV MK',
        //     className: 'btn_csv',
        //     text: 'Export to CSV'
        //   },
        //   // {
        //   extend: 'pdfHtml5',
        //   // title: 'PDF MK',
        //   className: 'btn_pdf',
        //   text: 'Export to PDF'
        // },

      ]

    });

    // $('.btn_pdf').attr("class", "btn btn-danger");
    // $('.btn_csv').attr("class", "btn btn-primary");
    // $('.btn_excel').attr("class", "btn btn-info");

  });
</script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#dataTables-auditee-').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      // dom: 'Blfrtip',
      "lengthMenu": [
        [10, 25, 50, -1],
        [10, 25, 50, "All"].
        // ],
        // dom: 'Blfrtip',
        // buttons: [{
        //     extend: 'excelHtml5',
        //     //title: 'Excel MK',
        //     className: 'btn_excel',
        //     text: 'Export to Excel'
        //   },
        //   {
        //     extend: 'csvHtml5',
        //     // title: 'CSV MK',
        //     className: 'btn_csv',
        //     text: 'Export to CSV'
        //   },
        //   // {
        //   extend: 'pdfHtml5',
        //   // title: 'PDF MK',
        //   className: 'btn_pdf',
        //   text: 'Export to PDF'
        // },

      ]

    });

    // $('.btn_pdf').attr("class", "btn btn-danger");
    // $('.btn_csv').attr("class", "btn btn-primary");
    // $('.btn_excel').attr("class", "btn btn-info");

  });
</script>

<script type="text/javascript">
  $(document).ready(function() {
    $('#dataTables-eg20').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      // dom: 'Blfrtip',
      "lengthMenu": [
        [10, 25, 50, -1],
        [10, 25, 50, "All"].
        // ],
        // dom: 'Blfrtip',
        // buttons: [{
        //     extend: 'excelHtml5',
        //     //title: 'Excel MK',
        //     className: 'btn_excel',
        //     text: 'Export to Excel'
        //   },
        //   {
        //     extend: 'csvHtml5',
        //     // title: 'CSV MK',
        //     className: 'btn_csv',
        //     text: 'Export to CSV'
        //   },
        //   // {
        //   extend: 'pdfHtml5',
        //   // title: 'PDF MK',
        //   className: 'btn_pdf',
        //   text: 'Export to PDF'
        // },

      ]

    });

    // $('.btn_pdf').attr("class", "btn btn-danger");
    // $('.btn_csv').attr("class", "btn btn-primary");
    // $('.btn_excel').attr("class", "btn btn-info");

  });
</script>

<script type="text/javascript">
  $(document).ready(function() {
    $('.deletebtn').on('click', function() {
      $('#deleteModal').modal('show');
      $try = $(this).closest('tr');


      var data = $tr.children("td").map(function() {

        return $(this).text();
      }).get();

      console.log(data);
      $('id').val(data[0]);

      $('#deleteModal').modal('show');

      //$('#up_id').val(data[0]);

    });
  });
</script>
<script type="text/javascript">
  $(document).ready(function() {
    $('.editbtn').on('click', function() {
      $('#editModal').modal('show');
      $try = $(this).closest('tr');


      var data = $tr.children("td").map(function() {

        return $(this).text();
      }).get();

      console.log(data);

      $('#up_id').val(data[0]);
      $('#Audit_activities').val(data[1]);
      $('#Team').val(data[2]);
      $('#Year').val(data[3]);
      $('#Quantity').val(data[4]);

      $('.editModal').modal('show');




    });
  });
</script>
<script type="text/javascript">
  $(document).ready(function() {
    $('.editbtn1').on('click', function() {
      $('#editModal1').modal('show');
      $try = $(this).closest('tr');


      var data = $tr.children("td").map(function() {

        return $(this).text();
      }).get();

      console.log(data);

      $('#id').val(data[0]);
      $('#Team').val(data[1]);
      $('#Audit_list').val(data[2]);
      $('#Quantity').val(data[3]);
      $('#Quarter_number').val(data[4]);
      $('#Start_date').val(data[4]);
      $('#End_date').val(data[4]);

      $('.editModal1').modal('show');




    });
  });
</script>
<script type="text/javascript">
  $(document).ready(function() {
    $('.editbtn2').on('click', function() {
      $('#editModal').modal('show');
      $try = $(this).closest('tr');


      var data = $tr.children("td").map(function() {

        return $(this).text();
      }).get();

      console.log(data);

      $('#id').val(data[0]);
      $('#name').val(data[1]);
      $('#designation').val(data[2]);
      $('#Address').val(data[3]);
      $('#email').val(data[4]);

      $('.editM').modal('show');
    });
  });
</script>


    

</body>

</html>