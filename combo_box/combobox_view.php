<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>ComboBox Bertingkat dengan Select 2 dan JQuery</title>
<div style="clear:both; margin-top:0em; margin-bottom:1em;"><a href="https://mylitenotes.com/codeigniter/membuat-button-export-dan-print-pada-datatables-serverside/" target="_blank" rel="dofollow" class="ud5756282701970b72e57a0ae310378e8"><!-- INLINE RELATED POSTS 2/3 //--><style> .ud5756282701970b72e57a0ae310378e8 { padding:0px; margin: 0; padding-top:1em!important; padding-bottom:1em!important; width:100%; display: block; font-weight:bold; background-color:#eaeaea; border:0!important; border-left:4px solid #34495E!important; box-shadow: 0 1px 2px rgba(0, 0, 0, 0.17); -moz-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.17); -o-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.17); -webkit-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.17); text-decoration:none; } .ud5756282701970b72e57a0ae310378e8:active, .ud5756282701970b72e57a0ae310378e8:hover { opacity: 1; transition: opacity 250ms; webkit-transition: opacity 250ms; text-decoration:none; } .ud5756282701970b72e57a0ae310378e8 { transition: background-color 250ms; webkit-transition: background-color 250ms; opacity: 1; transition: opacity 250ms; webkit-transition: opacity 250ms; } .ud5756282701970b72e57a0ae310378e8 .ctaText { font-weight:bold; color:inherit; text-decoration:none; font-size: 16px; } .ud5756282701970b72e57a0ae310378e8 .postTitle { color:#000000; text-decoration: underline!important; font-size: 16px; } .ud5756282701970b72e57a0ae310378e8:hover .postTitle { text-decoration: underline!important; } </style><div style="padding-left:1em; padding-right:1em;"><span class="ctaText">See also</span>  <span class="postTitle">Membuat Button Export dan Print pada Datatables Serverside</span></div></a></div>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

    <!-- Select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="col-md-6">
            <h3>ComboBox Bertingkat dengan Select 2 dan JQuery</h3>
            <form>
                <div class="form-group">
                    <label for="provinsi">Provinsi</label>
                    <select id="provinsi" name="provinsi" class="form-control select2">
                        <option value="" selected>Pilih Provinsi</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="kabupaten">Kabupaten</label>
                    <select id="kabupaten" name="kabupaten" class="form-control select2">
                        <option value="" selected>Pilih Kabupaten</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="kecamatan">Kecamatan</label>
                    <select id="kecamatan" name="kecamatan" class="form-control select2">
                        <option value="" selected>Pilih kecamatan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="kelurahan">Kelurahan</label>
                    <select id="kelurahan" name="kelurahan" class="form-control select2">
                        <option value="" selected>Pilih kelurahan</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

    <script type="text/javascript">
        // Provinsi
        $(document).ready(function() {
            $("#provinsi").select2({
                ajax: {
                    url: '<?= base_url() ?>combobox/getdataprov',
                    type: "post",
                    dataType: 'json',
                    delay: 200,
                    data: function(params) {
                        return {
                            searchTerm: params.term
                        };
                    },
                    processResults: function(response) {
                        return {
                            results: response
                        };
                    },
                    cache: true
                }
            });
        });

        // Kabupaten
        $("#provinsi").change(function() {
            var id_prov = $("#provinsi").val();
            $("#kabupaten").select2({
                ajax: {
                    url: '<?= base_url() ?>combobox/getdatakab/' + id_prov,
                    type: "post",
                    dataType: 'json',
                    delay: 200,
                    data: function(params) {
                        return {
                            searchTerm: params.term
                        };
                    },
                    processResults: function(response) {
                        return {
                            results: response
                        };
                    },
                    cache: true
                }
            });
        });

        // Kecamatan
        $("#kabupaten").change(function() {
            var id_kab = $("#kabupaten").val();
            $("#kecamatan").select2({
                ajax: {
                    url: '<?= base_url() ?>combobox/getdatakec/' + id_kab,
                    type: "post",
                    dataType: 'json',
                    delay: 200,
                    data: function(params) {
                        return {
                            searchTerm: params.term
                        };
                    },
                    processResults: function(response) {
                        return {
                            results: response
                        };
                    },
                    cache: true
                }
            });
        });

        // Kelurahan
        $("#kecamatan").change(function() {
            var id_kac = $("#kecamatan").val();
            $("#kelurahan").select2({
                ajax: {
                    url: '<?= base_url() ?>combobox/getdatakel/' + id_kac,
                    type: "post",
                    dataType: 'json',
                    delay: 200,
                    data: function(params) {
                        return {
                            searchTerm: params.term
                        };
                    },
                    processResults: function(response) {
                        return {
                            results: response
                        };
                    },
                    cache: true
                }
            });
        });
    </script>

</body>

</html>
