<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BrandRequest;
use App\Models\Brand;
use App\Repository\Brand\BrandInterface;
use App\Repository\Upload\UploadFactory;
use Spatie\PdfToImage\Pdf;

class BrandController extends Controller
{
    protected $brand;
    protected $uploadFactory;

    public function __construct(BrandInterface $brandInterface, UploadFactory $uploadFactory)
    {
        $this->brand = $brandInterface;
        $this->uploadFactory = $uploadFactory;
    }
    public function index()
    {
        return $this->brand->getAllData();
    }

    public function store(BrandRequest $request)
    {
        $data = $request->validated();

        return $this->brand->storeOrUpdate($data);
    }


    public function update(BrandRequest $request, Brand $brand)
    {
        $data = $request->validated();

        // $upload = $this->uploadFactory->initialize('DO');
        // $upload->upload($data);

        return $this->brand->storeOrUpdate($data + ['id' => $brand->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        //
    }
    public function convert()
    {
        
        $pathToPdf = public_path().'/pdf/sample.pdf';
        $pdf = new Pdf($pathToPdf);
        $totalPages = $pdf->getNumberOfPages();

        for($i = 1; $i <= $totalPages; $i++){
            $pathToWhereImageShouldBeStored = public_path().'/images/page'.$i.'.jpeg';
            $pdf->setPage($i)->saveImage($pathToWhereImageShouldBeStored);
        }
       
    }
}
