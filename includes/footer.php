    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.5.0/js/all.js" integrity="sha384-GqVMZRt5Gn7tB9D9q7ONtcp4gtHIUEW/yG7h98J7IpE3kpi+srfFyyB/04OV6pG0" crossorigin="anonymous"></script>
    <script src="../assets/js/intro.min.js"></script>
    <script>
        jQuery(document).ready(function($) {
            $(document).on('click', '.clickable-row', function() {
                window.location = $(this).data("href");
            });
            fetch('./resources/content/display-table.php').then((response) => {
                return response.text()
            }).then((data) => {
                $('#listing-content').html(data);
            })
            $('.listing-display span').click(function() {
                $(this).addClass('active').siblings().removeClass('active');
                let displayMode = $(this).data('display');
                if(displayMode === 'table') {
                    fetch('./resources/content/display-table.php').then((response) => {
                        return response.text()
                    }).then((data) => {
                        $('#listing-content').html(data).addClass('animated fadeIn');
                    })
                } else if(displayMode === 'items') {
                    fetch('./resources/content/display-items.php').then((response) => {
                        return response.text()
                    }).then((data) => {
                        $('#listing-content').html(data).addClass('animated fadeIn');
                    })
                }
           });
        });
    </script>
</body>
</html>