<div class="modal fade" id="quick-look-{{$offer->id}}">
    <div id="quick-look">
        <div class="modal-dialog modal-dialog-centered" >
            <div class="modal-content modal--shadow">

                <button class="btn dismiss-button fas fa-times" type="button" data-dismiss="modal"></button>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12 center">
                            <!--====== Product Detail Zoom ======-->
                            <div class="pd u-s-m-b-30">

                                    <div id="js-product-detail-modal">
                                        @foreach($offer->images as $singleImage)
                                        <div>
                                            <img class="u-img-fluid" src="{{ asset('storage/' . $offer->images->first()->path) }}" >
                                        </div>
                                        <hr>
                                        @endforeach
                                    </div>


                            </div>

                            <!--====== End - Product Detail Zoom ======-->

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
