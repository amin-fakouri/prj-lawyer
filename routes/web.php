<?php

use App\Livewire\Profile;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;



Route::get('/', \App\Livewire\Landing::class, )->name('welcome');



Route::get('/lw-dashboard', \App\Livewire\Dashboards\LawyerDashboard::class)
    ->middleware(['auth', 'signed'])->name('lawyer-dashboard');

Route::get('/ad-dashboard', \App\Livewire\Dashboards\AdminDashboard::class)
    ->middleware(['auth', 'signed'])->name('admin-dashboard');

Route::get('/tr-dashboard', \App\Livewire\Dashboards\TraineDashboard::class)
    ->middleware(['auth', 'signed'])->name('trainee-dashboard');

Volt::route('/dashboard/admin/edit-user-info/{user_id}', 'actions.edit_user')
    ->middleware(['auth', 'signed'])
    ->name('edit-user-info');

Volt::route('/users', \App\Livewire\UserIndex::class)
    ->name('users-index');

Volt::route('/post/{post_id}', 'actions.show-post')
    ->name('post.show');

Route::get('/profile/{user_id}', Profile::class)
    ->middleware(['auth', 'signed'])
    ->name('profile');

Route::get('/show-complaint', \App\Livewire\ShowComplaint::class)->name('show');

Volt::route('/create-complaint', 'actions.create-complaint')
    ->middleware(['auth'])->name('create-complaint');

Volt::route('/update-password/{user_id}', 'actions.update-password')
    ->middleware(['auth', 'signed'])
    ->name('update-password');

Volt::route('/upload-post/{user_id}', 'actions.upload-post')
    ->middleware(['auth', 'signed'])
    ->name('upload-post');

Volt::route('/create-user', 'actions.create-user')
    ->middleware(['auth', 'signed'])
    ->name('create-user');

Volt::route('/edite-post/{post_id}', 'actions.edite-post')
    ->middleware(['auth'])
    ->name('edite-post');

Volt::route('/edite-image/{post_id}', 'actions.edite-image')
    ->middleware(['auth'])
    ->name('edite-image');

Route::get('/all-post', \App\Livewire\AllPost::class)
    ->middleware(['auth', 'signed'])
    ->name('all-post');


Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Volt::route('/image/{user_id}', 'image')
    ->middleware(['auth', 'signed'])->name('image-profile');




Route::get('/lawyers', \App\Livewire\Lawyers\Lawyers::class)->name('lw');

Route::get('/person/{user_id}', \App\Livewire\Lawyers\Personlw::class)
    ->middleware(['signed'])->name('per_lw');

Route::get('/test/{user_id}', \App\Livewire\Lawyers\Test::class)->name('test');

Route::get('/all-news', \App\Livewire\News\AllNews::class)->name('all-news');

Route::get('/news/{post_id}', \App\Livewire\News\SingleNews::class)->name('post');

Route::get('/about', \App\Livewire\About::class)->name('about');


Route::get('/amour-refahi', \App\Livewire\Refahi\AmourRefahi::class)
    ->name('amour');

Route::get('/amour-trainee', \App\Livewire\Trainee\AmourTrainee::class)
    ->name('amour_trainee');

Route::get('/submit-manager', \App\Livewire\SubmitMng\SubmitManager::class)
    ->name('submit_mng');

Route::get('/did_tnk', \App\Livewire\DidTnk\DidTinkMsg::class)
    ->name('did_tnk');

Route::get('/see-more', \App\Livewire\SeeMore\SeeMore::class)
    ->name('see_more');

Route::get('/photo_gallery', \App\Livewire\PhotoAndGallery\PhotoAndGallery::class)
    ->name('photo_gallery');

Route::get('/komisuon', \App\Livewire\Koms\Koms::class)->name('koms');

Route::get('/create-koms', \App\Livewire\CreateKoms\CreateKoms::class)
    ->middleware(['auth'])->name('create_koms');

Route::get('/person/{user_id}', \App\Livewire\Person\PersonManagaer::class)
    ->middleware(['signed'])->name('person_mng');

Route::get('/post-electronic', \App\Livewire\PostElec\PostElec::class)
    ->name('post-elec');

Route::get('/img_update/{user_id}', \App\Livewire\ImgPro\Img::class)
    ->middleware(['auth', 'signed'])->name('test_img');

Route::get('/link', \App\Livewire\Link\Link::class)
    ->middleware(['auth'])->name('link');

Route::get('/create-about', \App\Livewire\CreateAbout::class)->middleware(['auth'])->name('create_about');

Route::get('/khadamat', \App\Livewire\KhadamatElec\Khadamat::class)->name('kh_elec');

Route::get('/managers', \App\Livewire\Managers::class)->name('mngs');

Route::get('/submit-shekayat', \App\Livewire\SubmitShekayat\SubmitShekayat::class)
    ->name('sbm_shekayat');

Route::get('/create-auto-masioun', \App\Livewire\Admin\CreateAutoMasioun::class)
    ->middleware(['auth'])->name('create_auto');

Route::get('/auto-masioun', \App\Livewire\AutoMasioun\AutoMasioun::class)
    ->name('auto_misoin');

Route::get('/create-rule', \App\Livewire\Admin\CreateRule::class)
    ->middleware(['auth'])->name('create_rule');

Route::get('/create-page-rule', \App\Livewire\Admin\CreatePageRule::class)
    ->middleware(['auth'])->name('create_page_rule');

Route::get('/list-rule', \App\Livewire\Admin\RuleList::class)
    ->middleware(['auth'])->name('rule_list');

Route::get('/rules-page/{page_id}', \App\Livewire\RulesPage\RulesPage::class)
    ->name('rule_page');

Route::get('/see-details/{post_id}', \App\Livewire\RulesPage\SeeDetailsRules::class)
    ->name('see_details');

Route::get('/see-complaint/{com_id}', \App\Livewire\Complaint\SeeComplaint::class)
    ->middleware(['auth', 'signed'])->name('see_complaint');

require __DIR__.'/auth.php';
