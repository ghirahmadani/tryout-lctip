<div class="container-fluid">
    <div class="row">
        <div class="col-9 bg-white p-0">
            <div class="text-center" style="background: rgba(196, 196, 196, 0.69); padding: 10px 0px;">
                <h3 class="text-dark">Online Test</h3>
                <p id="dueDate" class="d-none"><?=$dueDate?></p>
                <p id="baseUrl" class="d-none"><?=base_url()?></p>
                <p id="questionId" class="d-none"><?=$currentQuestion["question_id"]?></p>
            </div>
            <div class="" style="padding: 80px;margin-bottom: 5rem;">
                <h3 class="mb-3">Question <?=$currentQuestion["number"]?></h3>
                <img src="<?=base_url()?><?=$currentQuestion["question"]?>" class="mb-3" alt="">
                <div id="hiddenDiv" class="alert alert-success" role="alert">
                    Jawaban anda berhasil disimpan!
                </div>

                <?php $abjad = array("A. ","B. ","C. ","D. ","E. "); ?>
                <?php foreach($term as $index => $value): ?>
                    <div class="form-check mb-3">
                        <input class="form-check-input termQuestion" type="radio" name="term" id="exampleRadios<?=$value["term_id"]?>" value="<?=$value["term_id"]?>" <?php echo ($currentQuestion["term_id"] == $value["term_id"] ? "checked" : ""); ?>>
                        <label class="form-check-label text-dark" for="exampleRadios<?=$value["term_id"]?>">
                            <?=$abjad[$index]?><img src="<?=base_url()?><?=$value["term"]?>" alt="">
                        </label>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="" style="background: rgba(196, 196, 196, 0.4); padding: 20px 50px;position: absolute;bottom: 0;width: 100%; margin-top: 1rem;">
                <?php if($nextQuestion != null): ?>
                    <a href="<?=base_url()?>online-test/<?=$nextQuestion["number"]?>"><button style="background: #0468BF; padding: 5px 25px;" class="text-white">Next</button></a>
                <?php endif; ?>
                
                <a href="<?=base_url()?>online-test/clear/<?=$currentQuestion["question_id"]?>"><button style="background: #FCC65C; padding: 5px 25px; margin-left: 1rem;" class="text-white">Clear Choice</button></a>

                <?php if($nextQuestion == null): ?>
                    <button style="background: #398B39; padding: 5px 25px; position: absolute; right:50px; " data-toggle="modal" data-target="#exampleModalCenter" class="text-white">Submit</button>
                <?php endif; ?>
                
                <hr>
                <div class="text-center">
                    <div style="width: 10px; height: 10px; border-radius: 100%;" class="bg-current d-inline-block"></div>
                    <label class="mr-5" for="">Current</label>

                    <div style="width: 10px; height: 10px; border-radius: 100%;" class="bg-not-attempt d-inline-block"></div>
                    <label class="mr-5" for="">Not Attempted</label>

                    <div style="width: 10px; height: 10px; border-radius: 100%;" class="bg-attempt d-inline-block"></div>
                    <label class="mr-5" for="">Attempted</label>

                    <div style="width: 10px; height: 10px; border-radius: 100%;" class="bg-not-answer d-inline-block"></div>
                    <label class="mr-5" for="">Not Answered</label>
                </div>
            </div>
        </div>
        <div class="col-3 text-center p-0" style="min-height: 100vh;background: rgba(196, 196, 196, 0.2);">
            <div class="text-center" style="background: #C4C4C4; padding: 10px 0px;">
                <h3 class="text-dark">Time Left</h3>
            </div>
            <div class="timelieft my-4">
                <div class="row justify-content-center">
                    <div class="col-3">
                        <h4 id="hours">00</h4>
                        <p class="mb-0">Hours</p>
                    </div>

                    <div class="col-3">
                        <h4 id="minutes" >00</h4>
                        <p class="mb-0">Minutes</p>
                    </div>

                    <div class="col-3">
                        <h4 id="seconds">00</h4>
                        <p class="mb-0">Second</p>
                    </div>
                </div>
            </div>

            <div class="text-center" style="background: #C4C4C4; padding: 10px 0px;">
                <h3 class="text-dark">Question</h3>
            </div>
            <div class="timelieft my-4">
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <?php foreach($question as $row): ?>
                            <div class="col-2 px-2 mb-3 mx-1">
                                <p class="text-white mb-0 <?php echo ($currentQuestion["question_id"] == $row["question_id"] ? "bg-current" : (isset($questionNotAnswer[$row["question_id"]]) ? "bg-not-answer" : (isset($questionAnswer[$row["question_id"]]) ? "bg-attempt" : "bg-not-attempt"))); ?> py-2"><?=$row["number"]?></p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
        <p class="mb-0">Sudah yakin submit jawaban ? jawaban tidak dapat diubah ketika sudah submit!</p>
        <a href="<?=base_url()?>done"><button style="background: #398B39; padding: 5px 25px;" data-toggle="modal" data-target="#exampleModalCenter" class="btn text-white">Submit</button></a>
      </div>
    </div>
  </div>
</div>