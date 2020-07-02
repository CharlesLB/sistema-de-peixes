<a class="dropdown-item d-flex align-items-center" href="<?="mailto:".$mail->email?>">
    <div class="mr-3">
        <div class="icon-circle bg-primary">
            <i class="fas fa-file-alt text-white"></i>
        </div>
    </div>
    <div>
        <div class="small text-gray-500"><?= dateFormat($mail->created_at) . " - " . $mail->name ?></div>
        <span class="font-weight-bold"><?= mb_strimwidth($mail->message, 0, 50, "...");
 ?></span>
    </div>
</a>