<div class="card mb-4" id="<?= $mail->id ?>">
    <div class="card-header">
        <div class="small text-gray-500"><?= dateFormat($mail->created_at, true) . " - " . $mail->name ?></div>
    </div>
    <div class="card-body">
        <?= $mail->message ?>
    </div>
    <div class="card-footer d-flex justify-content-end">
        <button type="button" class="btn btn-secondary mr-3 makeAsUnread" data-id=<?=$mail->id?>>Marcar como não respondida</button>
    </div>
</div>