<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<!--<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>-->
<script src="../../assets/js/alert.js"></script>

<script>
    "use strict";
    let ochirishBTN = document.querySelectorAll(".ochirishBTN");
    ochirishBTN.forEach((button) => {
        button.addEventListener("click", () => {
            let categoryID = button.getAttribute("href").substring(1);

            swal({
                title: "Ishonchingiz komilmi?",
                text: "Oʻchirib tashlangandan soʻng, ushbu categoriya qayta tiklay olmaysiz!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        // Send an AJAX request to deleteCategory.php
                        const url = `/index.php/category/delete/${categoryID}`;
                        fetch(url, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                            },
                            body: JSON.stringify({
                                categoryID: categoryID
                            }),
                        })
                            .then(response => response.text())
                            .then(data => {
                                // console.log(data); // Log the response from the server
                                swal("Poof! Categoriya o'chirildi!", {
                                    icon: "success",
                                }).then(() => {
                                    window.location.reload();
                                });
                            })
                            .catch(error => {
                                console.error('Error:', error);
                            });
                    } else {
                        swal("Kategoriya xavfsiz!");
                    }
                });
        });
    });

</script>
</body>
</html>
<h1>Bu footer</h1>