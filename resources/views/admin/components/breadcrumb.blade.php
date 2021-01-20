<div class="page-breadcrumb">
    <div class="row">
        <div class="col-7 align-self-center">
            <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">
            <?php
                date_default_timezone_set('Asia/Jakarta');
                $jam = date("H");
                if (($jam >= 6) && ($jam <= 11)) {
                    echo "Selamat Pagi,";
                }else if(($jam > 11) && ($jam <= 15)) {
                    echo "Selamat Siang,";
                }else if(($jam > 15) && ($jam < 18)){
                    echo "Selamat Sore,";
                }else{
                    echo "Selamat Malam,";
                }
            ?> {{ Auth::user()->name }}
            </h3>
            {{-- <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 p-0">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a>
                        </li>
                    </ol>
                </nav>
            </div> --}}
        </div>
    </div>
</div>
