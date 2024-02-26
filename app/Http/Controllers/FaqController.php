<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\FaqInterface;
use App\Contracts\Interfaces\ServiceInterface;
use App\Models\Faq;
use App\Http\Requests\StoreFaqRequest;
use App\Http\Requests\UpdateFaqRequest;

class FaqController extends Controller
{
    private FaqInterface $faq;
    private ServiceInterface $service;
    public function __construct(FaqInterface $faq, ServiceInterface $service)
    {
        $this->faq = $faq;
        $this->service = $service;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $faqs = $this->faq->customPaginate(request(), 5);
        // dd($faqs);

        $services = $this->service->get();
        return view('admin.pages.faq.index', compact('faqs', 'services'));
    }




    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFaqRequest $request)
    {
        // dd($request->validated());
        $this->faq->store($request->validated());
        return redirect()->route('faq.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Faq $faq)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Faq $faq)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFaqRequest $request, Faq $faq)
    {
        $this->faq->update($faq->id, $request->validated());
        return redirect()->route('faq.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Faq $faq)
    {
        $this->faq->delete($faq->id);
        return redirect()->route('faq.index');
    }
}
