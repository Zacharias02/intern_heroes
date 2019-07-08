<?php

namespace App\Traits;

use File;
use ImgUploader;
use Auth;
use DB;
use Input;
use Carbon\Carbon;
use Redirect;
use App\User;
use App\ProfileProject;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\Requests\ProfileProjectFormRequest;
use App\Http\Requests\ProfileProjectImageFormRequest;

trait ProfileProjectsTrait
{

    public function showProfileProjects(Request $request, $user_id)
    {
        $user = User::find($user_id);
        $html = '';
        if (isset($user) && count($user->profileProjects)):
            $projectCounter = 0;
            foreach ($user->profileProjects as $project):
                if ($project->is_on_going == 1)
                    $date_end = 'Currently ongoing';
                else
                    $date_end = $project->date_end->format('d M, Y');

                $image = ImgUploader::get_image("project_images/thumb/$project->image");
                $html .= '<!--Project Start-->
              <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12" id="project_' . $project->id . '">
                <div class="mt-card-item">
                  <div class="mt-card-avatar mt-overlay-1">' . $image . '</div>
                  <div class="mt-card-content">
                    <h3 class="mt-card-name">' . $project->name . '</h3>
                    <p class="mt-card-desc font-grey-mint">
                    ' . $project->date_start->format('d M, Y') . ' - ' . $date_end . '<br />
                    ' . str_limit($project->description, 25, '...') . '</p>
                    <div class="mt-card-social">
                      <ul>
					  <li> <a href="javascript:;" onclick="showProfileProjectEditModal(' . $project->id . ');"><i class="icon-pencil"></i></a> </li>
                        <li> <a href="javascript:;" onclick="delete_profile_project(' . $project->id . ');"><i class="icon-close"></i></a> </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <!--Project End-->';
                $projectCounter++;
                if ($projectCounter == 4) {
                    $projectCounter = 0;
                    $html .= '<div style="clear:both;"></div>';
                }
            endforeach;
        else:
            $html .= '<!--Project Start-->
                    <div class="col-md-12">
                        <h4 class="text-center mb-4 text-empty">No Projects yet.<h4>
                    </div>
                <!--Project End-->';
        endif;

        echo $html;
    }

    public function showFrontProfileProjects(Request $request, $user_id)
    {
        $user = User::find($user_id);
        $html = '<div class="row">';
        if (isset($user) && count($user->profileProjects)):
            foreach ($user->profileProjects as $project):
                if ($project->is_on_going == 1)
                    $date_end = 'Currently ongoing';
                else
                    $date_end = $project->date_end->format('d M, Y');

                if($project->image != '' || $project->image != NULL){
                    $project_image = "project_images/mid/$project->image";
                }else{
                    $project_image = "images/default_image.png";
                }
                $image = ImgUploader::get_image($project_image);
                $html .= '<!--Project Start-->
                            <div class="thumbnail" id="project_' . $project->id . '">
                                <div class="row">
                                    <div class="col-md-4">
                                        ' . $image . '
                                    </div>
                                    <div class="col-md-8">
                                        <div class="caption">
                                            <h3>' . $project->name . '</h3>
                                            <p>' . $project->date_start->format('d M, Y') . ' - ' . $date_end . '<br />
                                            ' . str_limit($project->description, 25, '...') . '</p>
                                            <a class="text text-default" href="javascript:;" onclick="showProfileProjectEditModal(' . $project->id . ');">' . __('Edit') . '</a>&nbsp;|&nbsp;<a class="text text-danger" href="javascript:;" onclick="delete_profile_project(' . $project->id . ');">' . __('Delete') . '</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <!--Project End-->';
            endforeach;
        else:
            $html .= '<!--Project Start-->
                    <div class="col-md-12">
                        <h4 class="text-center mb-4 text-empty">No Projects yet.<h4>
                    </div>
                <!--Project End-->';
        endif;
        $html .= '</div>';

        echo $html;
    }

    public function showApplicantProfileProjects(Request $request, $user_id)
    {
        $user = User::find($user_id);
        $html = '<ul class="userPortfolio">';
        if (isset($user) && count($user->profileProjects)):
            $projectCounter = 0;
            foreach ($user->profileProjects as $project):
                if ($project->is_on_going == 1)
                    $date_end = __('Currently ongoing');
                else
                    $date_end = $project->date_end->format('d M, Y');

                $showLink = "";
                if ($project->url) :
                    $showLink = '<h5><a style="width: 160px;" class="btn btn-primary round" href="' . $project->url . '" target="_blank">View Project</a></h5>';
                endif;

                if($project->image != '' || $project->image != NULL){
                    $project_image = "project_images/thumb/$project->image"; 
                }else{
                    $project_image = "images/default_image.png";
                }
                $image = ImgUploader::get_image($project_image);
                $html .= '<li>
                <div class="row">
                    <div class="col-md-4">
                        ' . $image . '
                        <div class="imgbox hidden">' . $image . '
                            <div class="itemHover">
                            <div class="zoombox">
                                <a href="' . $project->url . '" title="' . $project->name . '" class="item-zoom fancybox-effects-a"><i class="fa fa-search" aria-hidden="true"></i></a> </div>
                            <div class="infoItem hidden">
                                <div class="itemtitle">
                                <h5>' . $project->name . '</h5>
                                <p>' . $project->date_start->format('d M, Y') . ' - ' . $date_end . '<br />
                                    ' . str_limit($project->description, 25, '...') . '</p>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <h4>' . $project->name . '</h4>
                        <div class="row">
                            <div class="col-md-12">
                                <span class="sub"> ' . $project->date_start->format('d M, Y') . ' - ' . $date_end . '</span>
                                <p>' . $project->description . '</p>
                                ' . $showLink . '
                            </div>
                        </div>
                    </div>
                </div>
                <div class="imgbox hidden">' . $image . '
                  <div class="itemHover">
                    <div class="zoombox"><a href="' . $project->url . '" title="' . $project->name . '" class="item-zoom fancybox-effects-a"><i class="fa fa-search" aria-hidden="true"></i></a> </div>
                    <div class="infoItem">
                      <div class="itemtitle">
                        <h5>' . $project->name . '</h5>
                        <p>' . $project->date_start->format('d M, Y') . ' - ' . $date_end . '<br />
						  ' . str_limit($project->description, 25, '...') . '</p>
                      </div>
                    </div>
                  </div>
                </div>
              </li>';
            endforeach;
        endif;

        echo $html . '</ul>';
    }

    public function uploadProjectTempImage(ProfileProjectImageFormRequest $request)
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            if (is_array($image)) {
                foreach ($image as $img) {
                    $fileName = ImgUploader::UploadImage('temp_project_images', $img);
                    $this->putImageInSession($fileName);
            }
            }  else {
                $fileName = ImgUploader::UploadImage('temp_project_images', $image);
                $this->putImageInSession($fileName);
            }
            echo $fileName;
        } else {
            echo 'No Image';
        }
    }

    private function putImageInSession($fileName)
    {
        $session_id = session()->getId();
        $images = session()->get($session_id . 'temp.project_images', []);
        $images[] = $fileName;
        session()->put($session_id . 'temp.project_images', $images);
    }

    public function getProfileProjectForm(Request $request, $user_id)
    {
        $session_id = session()->getId();
        session()->forget($session_id . 'temp.project_images');

        $user = User::find($user_id);
        $returnHTML = view('admin.user.forms.project.project_modal')->with('user', $user)->render();
        return response()->json(array('success' => true, 'html' => $returnHTML));
    }

    public function getFrontProfileProjectForm(Request $request, $user_id)
    {
        $session_id = session()->getId();
        session()->forget($session_id . 'temp.project_images');

        $user = User::find($user_id);
        $returnHTML = view('user.forms.project.project_modal')->with('user', $user)->render();
        return response()->json(array('success' => true, 'html' => $returnHTML));
    }

    public function storeProfileProject(ProfileProjectFormRequest $request, $user_id)
    {

        $profileProject = new ProfileProject();
        $profileProject = $this->assignProjectValues($profileProject, $request, $user_id);
        $profileProject->save();

        $this->addProfileProjectImage($request, $profileProject);

        $returnHTML = view('admin.user.forms.project.project_thanks')->render();
        return response()->json(array('success' => true, 'status' => 200, 'html' => $returnHTML), 200);
    }

    public function storeFrontProfileProject(ProfileProjectFormRequest $request, $user_id)
    {

        $profileProject = new ProfileProject();
        $profileProject = $this->assignProjectValues($profileProject, $request, $user_id);
        $profileProject->save();

        $this->addProfileProjectImage($request, $profileProject);

        $returnHTML = view('admin.user.forms.project.project_thanks')->render();
        return response()->json(array('success' => true, 'status' => 200, 'html' => $returnHTML), 200);
    }

    private function assignProjectValues($profileProject, $request, $user_id)
    {
        $profileProject->user_id = $user_id;
        $profileProject->name = $request->input('name');
        $profileProject->url = (false === strpos($request->input('url'), 'http')) ? 'http://' . $request->input('url') : $request->input('url') ;
        $profileProject->date_start = $request->input('date_start');
        $profileProject->date_end = $request->input('date_end');
        $profileProject->is_on_going = $request->input('is_on_going');
        $profileProject->description = $request->input('description');
        return $profileProject;
    }

    public function getProfileProjectEditForm(Request $request, $user_id)
    {
        $session_id = session()->getId();
        session()->forget($session_id . 'temp.project_images');

        $project_id = $request->input('project_id');
        $profileProject = ProfileProject::find($project_id);
        $user = User::find($user_id);
        $returnHTML = view('admin.user.forms.project.project_edit_modal')
                ->with('user', $user)
                ->with('profileProject', $profileProject)
                ->render();
        return response()->json(array('success' => true, 'html' => $returnHTML));
    }

    public function getFrontProfileProjectEditForm(Request $request, $user_id)
    {
        $session_id = session()->getId();
        session()->forget($session_id . 'temp.project_images');

        $project_id = $request->input('project_id');
        $profileProject = ProfileProject::find($project_id);
        $user = User::find($user_id);
        $returnHTML = view('user.forms.project.project_edit_modal')
                ->with('user', $user)
                ->with('profileProject', $profileProject)
                ->render();
        return response()->json(array('success' => true, 'html' => $returnHTML));
    }

    public function updateProfileProject(ProfileProjectFormRequest $request, $project_id, $user_id)
    {

        $profileProject = ProfileProject::find($project_id);
        $profileProject = $this->assignProjectValues($profileProject, $request, $user_id);
        $profileProject->update();

        $this->addProfileProjectImage($request, $profileProject);

        $returnHTML = view('admin.user.forms.project.project_edit_thanks')->render();
        return response()->json(array('success' => true, 'status' => 200, 'html' => $returnHTML), 200);
    }

    public function updateFrontProfileProject(ProfileProjectFormRequest $request, $project_id, $user_id)
    {

        $profileProject = ProfileProject::find($project_id);
        $profileProject = $this->assignProjectValues($profileProject, $request, $user_id);
        $profileProject->update();

        $this->addProfileProjectImage($request, $profileProject);

        $returnHTML = view('user.forms.project.project_edit_thanks')->render();
        return response()->json(array('success' => true, 'status' => 200, 'html' => $returnHTML), 200);
    }

    private function addProfileProjectImage($request, $profileProject)
    {
        /*         * ********************************* */
        $session_id = session()->getId();
        $images = session()->get($session_id . 'temp.project_images', []);
        if (count($images) > 0) {
            foreach ($images as $fileName) {
                $newFileName = $profileProject->name . '_' . str_random(5);
                $newFileName = ImgUploader::MoveImage($fileName, $newFileName, 'temp_project_images', 'project_images');
                if ($newFileName) {
                    $this->saveImage($newFileName, $profileProject);
                }
            }
            session()->forget($session_id . 'temp.project_images');
        }
        /*         * ********************************* */
    }

    public function saveImage($fileName, $profileProject)
    {
        $this->deleteProfileProjectImage($profileProject->id);
        $profileProject->image = $fileName;
        $profileProject->update();
    }

    public function deleteAllProfileProjects($user_id)
    {
        $profileProjects = ProfileProject::where('user_id', '=', $user_id)->get();
        foreach ($profileProjects as $profileProject) {
            echo $this->removeProfileProject($profileProject->id);
        }
    }

    public function deleteProfileProject(Request $request)
    {
        $id = $request->input('id');
        echo $this->removeProfileProject($id);
    }

    private function removeProfileProject($id)
    {
        try {
            $this->deleteProfileProjectImage($id);
            $profileProject = ProfileProject::findOrFail($id);
            $profileProject->delete();
            return 'ok';
        } catch (ModelNotFoundException $e) {
            return 'notok';
        }
    }

    private function deleteProfileProjectImage($id)
    {
        try {
            $profileProject = ProfileProject::findOrFail($id);
            $image = $profileProject->image;
            if (!empty($image)) {
                File::delete(ImgUploader::real_public_path() . 'project_images/thumb/' . $image);
                File::delete(ImgUploader::real_public_path() . 'project_images/mid/' . $image);
                File::delete(ImgUploader::real_public_path() . 'project_images/' . $image);
            }
            return 'ok';
        } catch (ModelNotFoundException $e) {
            return 'notok';
        }
    }

}
