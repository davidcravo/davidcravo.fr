<?php
class Counter{
    private $file;

    public function __construct(string $file)
    {
        $this->file = $file;
    }

    public function increment(): void
    {
        $counter = 1;
        if(file_exists($this->file)){
            $counter = (int)file_get_contents($this->file);
            $counter++;
        }
        file_put_contents($this->file, $counter);
    }

    public function recover(): int
    {
        if(!file_exists($this->file)){
            return 0;
        }
        return file_get_contents($this->file);
    }

    public function recover_month(int $year, int $month): int{
        $month = str_pad($month, 2, '0', STR_PAD_LEFT);
        $file = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'statistics' . DIRECTORY_SEPARATOR . 'counter-' . $year . '-' . $month . '-' . '*';
        $files = glob($file);
        $total = 0;
        foreach($files as $file){
            $total += file_get_contents($file);
        }
        return $total;
    }

    public function recover_month_details(int $year, int $month): array{
        $month = str_pad($month, 2, '0', STR_PAD_LEFT);
        $file = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'statistics' . DIRECTORY_SEPARATOR . 'counter-' . $year . '-' . $month . '-' . '*';
        $files = glob($file);
        $visits = [];
        foreach($files as $file){
            $parts = explode('-', basename($file));
            $visits[] = [
                'day' => $parts[3],
                'total' => file_get_contents($file)
            ];
        }
        return $visits;
    }
}