<?php
require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'components' . DIRECTORY_SEPARATOR . 'header.php';

require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'functions' . DIRECTORY_SEPARATOR . 'authentification.php';

user_log_in();


$file_counter_total = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'statistics' . DIRECTORY_SEPARATOR . 'counter';
$file_counter_daily = $file_counter_total . '-' . date('Y-m-d');

$year = (int)date('Y');
$year_selected = empty($_GET['year']) ? null : (int)$_GET['year'];
$months = [
    '01' => 'Janvier',
    '02' => 'Février',
    '03' => 'Mars',
    '04' => 'Avril',
    '05' => 'Mai',
    '06' => 'Juin',
    '07' => 'Juillet',
    '08' => 'Août',
    '09' => 'Septembre',
    '10' => 'Octobre',
    '11' => 'Novembre',
    '12' => 'Décembre'
];
$month = (int)date('m');
$month_selected = empty($_GET['month']) ? null : (int)$_GET['month'];

$counter_total = new Counter($file_counter_total);
$counter_total->increment();
$counter_daily = new Counter($file_counter_daily);
$counter_daily->increment();
if($year_selected && $month_selected){
    $visits = $counter_total->recover_month($year_selected, $month_selected);
    $detail = $counter_total->recover_month_details($year_selected, $month_selected);
}else{
    $visits = $counter_total->recover();
}

?>

<main class="main_dashboard">
    <section>
        <div class="row">
            <div class="col-md-4">
                <div class="list-group">
                    <?php for($i=0; $i<5; $i++): ?>
                        <a class="list-group-item <?= $year - $i === $year_selected ? 'active' : ''; ?>" href="dashboard.php?year=<?= $year - $i ?>"><?= $year - $i ?></a>
                        <?php if($year - $i === $year_selected): ?>
                            <div class="list-group">
                            <?php foreach($months as $k => $value): ?>
                                <a href="dashboard.php?year=<?=$year_selected ?>&month=<?= $k ?>" class="list-group-item <?= $month_selected === $k ? 'active' : ''; ?>"><?= $value ?></a>
                            <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    <?php endfor; ?>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card mb-4">
                    <div class="card-body">
                        Il y a eu <strong style="font-size: 3em;"><?= $visits ?></strong> visite<?= ($visits>1) ? 's' : ''; ?>
                    </div>
                </div>
                <?php if(isset($detail)): ?>
                    <h2>Détails des visites pour le mois :</h2>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Jour</th>
                                <th>Nombre de visites</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($detail as $line): ?>
                            <tr>
                                <td><?= $line['day'] ?></td>
                                <td><?= $line['total'] ?> visite<?= $line['total']>1 ? 's' : ''; ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php endif; ?>
            </div>
        </div>
    </section>
</main>

<?php require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'components' . DIRECTORY_SEPARATOR . 'footer.php'; ?>