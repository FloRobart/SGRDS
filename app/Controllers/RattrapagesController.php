<?php 
namespace App\Controllers;  
use App\Models\DSModele;
use App\Models\RattrapageModele;
use CodeIgniter\Controller;
use App\Models\AdministrateurModel;

class RattrapagesController extends Controller
{
    public function __construct()
    {
        helper(['form', 'mail']);
    }


    /**
     * Permet d'afficher la page d'accueil
     */
    public function index()
    {
        return view('homeVue');
    }

    public function updateRattrapage()
    {
        $model = new RattrapageModele();
        $modelDs = new DSModele();
        $modelAdmin = new AdministrateurModel();
        $data = [];
        $data['rattrapages'] = $model->getAllRattrapages();
        $data['ds'] = $modelDs->getAllDS();
        $data['admins'] = $modelAdmin->getAllAdmins();
        return view('updateRattrapageVue', $data);
    }
    public function getRattrapagesProg()
    {
        $model = new RattrapageModele();
        $modelDs = new DSModele();
    
        // Get rattrapages and ds data
        $rattrapages = $model->getAllRattrapagesByType("PROGRAMME");
        //print it to see if it works
        $ds = $modelDs->getDS();
    
        // Create an associative array with ds IDs as keys and ds data as values
        $dsById = [];
        foreach ($ds as $d) {
            $dsById[$d->id] = $d;
        }
    
        // Add ds data to each rattrapage
        foreach ($rattrapages as $rattrapage) {
            if (isset($dsById[$rattrapage->ds_id])) {
                $rattrapage->ds = $dsById[$rattrapage->ds_id];
            }
        }
    
        // Return rattrapages with linked ds data
        $data['rattrapages'] = $rattrapages;
    
        return view('rattrapagesProgVue', $data);
    }

    /**
     * Permet d'afficher la page d'accueil
     */
    public function rattrapagesAFaire()
    {
        return view('rattrapagesAFaireVue');
    }

    /**
     * Permet d'afficher la page d'accueil
     */
    public function rattrapagesProg()
    {
        return view('rattrapagesProgVue');
    }

    /**
     * Permet d'afficher la page d'accueil
     */
    public function detailsRattrapage()
    {
        return view('detailsRattrapageVue');
    }
}