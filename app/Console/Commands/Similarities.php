<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Startup;
use Carbon\Carbon;

class Similarities extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'similarities:calc';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Calcul de la matrice d\'adjacence des startups';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
      $this->line('Début...');

      $startups = Startup::all()->toArray();
      $dones = [];
      $nodes = [];
      $edges = [];

      foreach($startups as $s1)
      {
        $s1_filtered = $this->filter($s1);
        $nodes[] = $s1_filtered;
        foreach ($startups as $s2)
        {
          if($s2['id'] == $s1['id'] || in_array($s2['id'], $dones)) continue;

          // Ajout d'un lien uniquement sur la similarité est non nulle
          $sim = $this->similarity($s1_filtered, $this->filter($s2));
          if($sim > 0)
            $edges[] = [
              'Source' => $s1['id']-1,  // -1 car Gephi fait sa propre indexation des noeuds, à partir de 0
              'Target' => $s2['id']-1,  // or, nos ids en base de données commencent à 1
              'Type' => "Undirected",
              'Id' => "",
              'Label' => "",
              'Weight' => $sim,
            ];

        }
        $dones[] = $s1['id'];
      }

      $this->getCsv($nodes, $edges);
      $this->info('Terminé.');
    }

    /**
     * Algorithme de calcul de proximité entre deux Startups
     *
     * @return float
     */
    private function similarity($s1, $s2)
    {
      $t = 0;

      // Même département (GX)
      if($s1['department_id'] == $s2['department_id']) $t += 0.5;

      // Même domaine d'activité
      if(isset($s1['field_id']) && isset($s2['field_id']))
        if($s1['field_id'] == $s2['field_id']) $t += 0.2;

      // Même NAF
      if($s1['NAF_code'] == $s2['NAF_code']) $t += 0.2;

      // Année de fondation
      $year1 = Carbon::createFromFormat('Y-m-d', $s1['foundation_date'])->year;
      $year2 = Carbon::createFromFormat('Y-m-d', $s2['foundation_date'])->year;
      //if($year1 == $year2) $t += 0.1;

      return $t;
    }

    /**
     * Filtre les données avec certains champs uniquement
     *
     * @return array
     */
    private function filter($array)
    {
      $keys = [
        'id',
        'name_official',
        'name_commercial',
        'foundation_date',
        'description',
        'NAF_code',
        'SIREN',
        'SIRET',
        'email',
        'phone',
        'url',
        'facebook',
        'twitter',
        'linkedin',
        'sources',
      ];

      $res = [];

      foreach($array as $k => $v)
      {
        if(in_array($k, $keys)) $res[$k] = $v;

        if($k == 'department' && count($v > 0)) {
          $res['department_id'] = $v['id'];
          $res['department_name'] = $v['name'];
          $res['department_desc'] = $v['description'];
        }

        if($k == 'field' && count($v) > 0) {
          $res['field_id'] = $v['id'];
          $res['field_name'] = $v['name'];
        }

        if($k == 'legal_status' && count($v) > 0) {
          $res['legal_status_id'] = $v['id'];
          $res['legal_status_name'] = $v['name'];
        }

        if($k == 'address' && count($v) > 0) {
          $res['full_address'] = $v['full_address'];
        }
      }

      foreach($res as $k => $v)
        $res[$k] = str_replace("\n", " ", $v);

      return $res;
    }

    /**
     * Génère les CSV nodes et edges dans la racine du projet
     *
     * @return array
     */
    private function getCsv($nodes, $edges)
    {
      // Nodes
      $nodes_att = [];
      foreach($nodes[0] as $k => $v) $nodes_att[] = $k;
      $fp = fopen('nodes.csv', 'w+');
      fputcsv($fp, $nodes_att);
      foreach ($nodes as $line) fputcsv($fp, $line);
      fclose($fp);

      // Edges
      $edges_att = [];
      foreach($edges[0] as $k => $v) $edges_att[] = $k;
      $fp = fopen('edges.csv', 'w+');
      fputcsv($fp, $edges_att);
      foreach ($edges as $line) fputcsv($fp, $line);
      fclose($fp);
    }
}
