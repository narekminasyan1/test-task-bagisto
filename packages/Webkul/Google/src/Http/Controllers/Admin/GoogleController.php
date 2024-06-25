<?php

namespace Webkul\Google\Http\Controllers\Admin;

use Illuminate\Routing\Controller;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\View\View;
use Webkul\Google\Repositories\GoogleRepository;

class GoogleController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $googleRepository;

    public function __construct(GoogleRepository $googleRepository)
    {
        $this->googleRepository = $googleRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index() : View
    {
        try {
            $data = $this->googleRepository->getData();
        } catch (\Exception $e) {
            throw $e;
        }

        return view('google::admin.index', compact('data'));
    }
}
