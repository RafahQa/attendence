    <div id = "footer">
        <?php       
            echo '<br/>'.'<br/>'.'<br/>'.'<hr/>'.'Copyright © '.date('y');
        ?>
    </div>
</div>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $( function() {
    $("#dob").datepicker({
      changeMonth: true,
      changeYear: true,
      yearRange: "-100:+0",
      dateFormat: "yy-mm-dd"
    });
  } );
</script>
</body>

</html>