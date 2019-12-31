<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

use App\QuenMatKhau;
use App\NguoiChoi;
use App\Mail\SendMail;

class SendMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $email;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($email)
    {
        $this->email = $email;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $info = NguoiChoi::where('email', $this->email)->first();
        $code = rand(10000, 100000);
        $ketQua = QuenMatKhau::updateOrCreate(
            ['email' => $this->email],
            [
                'ma_xac_nhan'  => $code,
                'han_su_dung'  => Carbon::now()->addMinutes(5)
            ]
        );
        Mail::to($this->email)
            ->send(new SendMail($info, $code));
    }
}
