    public function edit()
    {
        return view('profile.edit');
    }

    public function update()
    {
        return redirect('profile/edit');
    }
