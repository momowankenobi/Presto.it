<?php

namespace App\Jobs;

use App\Models\Images;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class GoogleVisionLabelImage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    private $image_id;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($image_id)
    {
        $this->image_id = $image_id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $i = Images::find($this->image_id);
        if (! $i){
            return;
        }
        
        $image = file_get_contents(storage_path('/app/' . $i->file));
        putenv('GOOGLE_APPLICATION_CREDENTIALS=' . base_path('google_credential.json'));
        $imageAnnotator = new ImageAnnotatorClient();
        $response = $imageAnnotator->labelDetection($image);
        $labels = $response->getLabelAnnotations();
        if ($labels){
            $result=[];
            foreach ($labels as $label){
                $result[] = $label->getDescription();
            }

            echo json_encode($result);
            $i->labels = json_encode($result);
            $i->save();
        }
        $imageAnnotator->close();
    }
}
