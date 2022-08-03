<?php
    include('template/header.php');
?>
                    <div class="jumbotron">
                        <h1 class="display-3">About Us</h1>
                        <p class="lead">We help you to select the best books in the world</p>
                        <hr class="my-2">
                        <div class="row">
                            <div class="col-md-6">
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque voluptatum rem magni maiores rerum animi qui non corrupti ea. Necessitatibus laboriosam quisquam officia. Hic ipsa aspernatur pariatur fugiat doloremque molestias sint quis suscipit animi ad quisquam ea architecto nam at cupiditate eum libero vero eos quae ex, quo deserunt placeat!Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque voluptatum rem magni maiores rerum animi qui non corrupti ea. Necessitatibus laboriosam quisquam officia. Hic ipsa aspernatur pariatur fugiat doloremque molestias sint quis suscipit animi ad quisquam ea architecto nam at cupiditate eum libero vero eos quae ex, quo deserunt placeat!</p>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Contact Us
                                </button>
                            </div>
                            <div class="col-md-6">
                                <div id="map" style="width:100%; height:400px;"></div>
                            </div>

                        </div>



                        <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content text-center">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Contact Us</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p>library@somedomain.com</p>
                                                <p>+48 666 666 666</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                    </div>

<?php
    include('template/footer.php');

?>