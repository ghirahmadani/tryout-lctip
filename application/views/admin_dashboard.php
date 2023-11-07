<div class="container">
    <div class="row" style="margin-top: 100px;">
        <div class="col-12 mb-5">
            <h3>Data Peserta</h3>
            <table class="example" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Username</th>
                        <th>School</th>
                        <th>Team</th>
                        <th>Handphone</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; foreach($user as $value): ?>
                        <tr>
                            <td><?=$no++?></td>
                            <td><?=$value["name"]?></td>
                            <td><?=$value["username"]?></td>
                            <td><?=$value["school_name"]?></td>
                            <td><?=$value["team_name"]?></td>
                            <td><?=$value["handphone"]?></td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn" style="cursor: pointer" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-ellipsis-v"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item " href="<?=base_url('adminDashboard/changePassword/'.$value["id_user"])?>">Change Password</a>
                                        <a class="dropdown-item " href="<?=base_url('adminDashboard/resetDevice/'.$value["id_user"])?>">Reset Device Login</a>
                                        <a class="dropdown-item " href="<?=base_url('adminDashboard/resetSubmit/'.$value["id_user"])?>">Reset Submit Test</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?> 
                </tbody>
            </table>
        </div>
        <div class="col-12 mb-5">
            <h3>Data Hasil Qualification Pagi</h3>
            <table class="example" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>School</th>
                        <th>School Region</th>
                        <th>Team</th>
                        <th>Jawaban Soal Normal</th>
                        <th>Jawaban Soal Benar Salah</th>
                        <th>Jawaban Benar</th>
                        <th>Jawaban Salah</th>
                        <th>Tidak Menjawab</th>
                        <th>Total Skor</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; foreach($answer2 as $value): ?>
                        <tr>
                            <td><?=$no++?></td>
                            <td><?=$value["name"]?></td>
                            <td><?=$value["school"]?></td>
                            <td><?=$value["school_region"]?></td>
                            <td><?=$value["team"]?></td>
                            <td><?=$value["general_answer"]?></td>
                            <td><?=$value["true_false_answer"]?></td>
                            <td><?=$value["correct_answer"]?></td>
                            <td><?=$value["wrong_answer"]?></td>
                            <td><?=$value["null_answer"]?></td>
                            <td><?=$value["total_scor"]?></td>
                        </tr>
                    <?php endforeach; ?> 
                </tbody>
            </table>
        </div>
        <div class="col-12 mb-5">
            <h3>Data Hasil Qualification Siang</h3>
            <table class="example" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>School</th>
                        <th>School Region</th>
                        <th>Team</th>
                        <th>Jawaban Soal Normal</th>
                        <th>Jawaban Soal Benar Salah</th>
                        <th>Jawaban Benar</th>
                        <th>Jawaban Salah</th>
                        <th>Tidak Menjawab</th>
                        <th>Total Skor</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; foreach($answer3 as $value): ?>
                        <tr>
                            <td><?=$no++?></td>
                            <td><?=$value["name"]?></td>
                            <td><?=$value["school"]?></td>
                            <td><?=$value["school_region"]?></td>
                            <td><?=$value["team"]?></td>
                            <td><?=$value["general_answer"]?></td>
                            <td><?=$value["true_false_answer"]?></td>
                            <td><?=$value["correct_answer"]?></td>
                            <td><?=$value["wrong_answer"]?></td>
                            <td><?=$value["null_answer"]?></td>
                            <td><?=$value["total_scor"]?></td>
                        </tr>
                    <?php endforeach; ?> 
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('.example').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
            ]
        } );
    } );
</script>