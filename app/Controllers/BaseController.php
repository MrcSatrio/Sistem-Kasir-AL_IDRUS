<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

use App\Models\BrandModel;
use App\Models\CustomerModel;
use App\Models\KartuModel;
use App\Models\KategoriModel;
use App\Models\PegawaiModel;
use App\Models\ProdukModel;
use App\Models\RoleModel;
use App\Models\TransaksiDetailModel;
use App\Models\TransaksiModel;
use Config\Services;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
abstract class BaseController extends Controller
{
    protected $brandModel = BrandModel::class;
    protected $customerModel = CustomerModel::class;
    protected $kartuModel = KartuModel::class;
    protected $kategoriModel = KategoriModel::class;
    protected $pegawaiModel = PegawaiModel::class;
    protected $produkModel = ProdukModel::class;
    protected $roleModel = RoleModel::class;
    protected $transaksidetailModel = TransaksiDetailModel::class;
    protected $transaksiModel = TransaksiModel::class;
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var array
     */
    protected $helpers = [];

    /**
     * Be sure to declare properties for any property fetch you initialized.
     * The creation of dynamic property is deprecated in PHP 8.2.
     */
    // protected $session;

    /**
     * @return void
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.

        // E.g.: $this->session = \Config\Services::session();
        $this->brandModel = new BrandModel();
        $this->customerModel = new CustomerModel();
        $this->kartuModel = new KartuModel();
        $this->kategoriModel = new KategoriModel();
        $this->pegawaiModel = new PegawaiModel();
        $this->produkModel = new ProdukModel();
        $this->roleModel = new RoleModel();
        $this->transaksidetailModel = new TransaksiDetailModel();
        $this->transaksiModel = new TransaksiModel();
    }
}
