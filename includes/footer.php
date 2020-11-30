<footer>
    <?php
        $query = "SELECT NOW() as date";
        $current_year_query = mysqli_query($connection, $query);
        if(!$current_year_query){
            die('Query Failed: ' . mysqli_error($connection));
        }
        while($row = mysqli_fetch_assoc($current_year_query)){
            $current_year = $row['date'];
        }
    ?>
    <div class="row">
        <div class="col-lg-12">
            <p>Copyright &copy; Utsavdj <?php echo date('Y', strtotime($current_year)); ?></p>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
</footer>

</div>
<!-- /.container -->

<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

</body>

</html>
