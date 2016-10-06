
<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
class ContactController extends Controller
{
    /**
	* This is a single action controller, so it needs one action method, __invoke()
	*/
    public function __invoke() {
        return 'This page will display contact information';
    }
} # end of class
