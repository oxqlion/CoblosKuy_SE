<?php

namespace App\Http\Controllers;

use App\Models\CandidateModel;
use App\Models\ElectionModel;
use App\Models\User;
use App\Models\VoteModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Auth;

class ElectionController extends Controller
{

    // mengambil semua election data
    public function getAllElection(){
        $elections = ElectionModel::all();

        return view('dashboard', [
            'elections' => $elections
        ]);
    }

    // mengambil data election dengan detail
    public function getElectionData($electionId)
    {
        $votingTime = $this->getVotingTime($electionId);
        $currentTime = Carbon::now('Asia/Jakarta');
        $candidates = CandidateModel::where('electionId', $electionId)->get();
        $electionData = ElectionModel::findOrFail($electionId);

        if ($currentTime >= $votingTime['votingTimeStart'] && $currentTime < $votingTime['votingTimeEnd']){
            try {

                return view('electiondetailview', [
                    'electionData' => $electionData,
                    'candidates' => $candidates,
                    'error' => null,
                ]);
            }
            catch (Exception $e) {
                return redirect()->back()->with('error', $e->getMessage());
            }
        } else {
            return view('electiondetailview', [
                'electionData' => $electionData,
                'candidates' => $candidates,
                'error' => 'The time for this election has ended.'
            ]);
        }
    }

    public function getVotingPage($electionId)
    {
        $check = $this->processVote($electionId);
        if ($check) {
            return redirect()->back()->with('error', 'You have already voted');
        } else {
            try {
                $candidates = CandidateModel::where('electionId', $electionId)->get();
                return view('votingpageview', [
                    'candidates' => $candidates
                ]);
            }
            catch (Exception $e) {
                return redirect()->back()->with('error', $e->getMessage());
            }
        }
    }

    public function vote(Request $request, $id){
        $candidate = CandidateModel::find($id);
        $election = ElectionModel::where('id', $candidate->electionId)->first();
        $user = Auth::user();
            try {
                $this->createVote($election->id, $user->id);
                $this->updateVoteCount($id);
                $elections = ElectionModel::all();

                return redirect()->route('electiondetail', ['id' => $election->id]);
            }
            catch (Exception $e) {
                return redirect()->back()->with('error', $e->getMessage());
            }
    }

    // melakukan pengecekkan apakah user dengan id sekian sudah vote di election dengan id sekian
    public function processVote($electionId)
    {
        $user = Auth::user();
        $hasVoted = VoteModel::where('userId', $user->id)
            ->where('electionId', $electionId)
            ->first();

        return $hasVoted;
        // if ($hasVoted) {
        //     return redirect()->back()->with('error', 'You have already voted');
        // }
        // else {
        //     return $this->createVote($electionId, $userId);
        // }
    }

    // mendapatkan data detail mengenai candidate
    public function getCandidateDetail($id)
    {
        try {
            $candidateDetail = CandidateModel::findOrFail($id);
            return view('candidatedetailview', [
                'candidateDetail' => $candidateDetail
            ]);
        }
        catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    // menambah jumlah vote yang dimiliki oleh candidate
    public function updateVoteCount($candidateId)
    {
        try {
            $candidate = CandidateModel::findOrFail($candidateId);
            $candidate->voteCount = $candidate->voteCount + 1;
            $candidate->save();
            return redirect()->back();
        }
        catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    // menambahkan data baru pada VoteModel
    public function createVote($electionId, $userId)
    {
        $nowJakarta = Carbon::now()->setTimezone('Asia/Jakarta');
        VoteModel::create([
            'electionId' => $electionId,
            'voteTime' => $nowJakarta,
            'userId' => $userId,
        ]);
    }

    // mengambil data waktu voting
    public function getVotingTime($electionId)
    {
        try {
            $votingTimeStart = ElectionModel::findOrFail($electionId)->timeStart;
            $votingTimeEnd = ElectionModel::findOrFail($electionId)->timeEnd;
            return [
                'votingTimeStart' => $votingTimeStart,
                'votingTimeEnd' => $votingTimeEnd,
            ];
            // return view('', [
            //     'votingTimeStart' => $votingTimeStart,
            //     'votingTimeEnd' => $votingTimeEnd,
            // ]);
        }
        catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    // bisa pakai Javascript
    // public function validateSelectedCandidate()
    // {

    // }

    // kalau dapetin electionData, otomatis kan bisa di set untuk return ke view
    // jadi gaperlu dipisahin ke function lain view nya
    // public function displayElectionDetailView()
    // {

    //

    // gaperlu dibuatkan function, seharusnya saat user menekan button langsung memanggil function lain biar efisien
    // bisa dibuat if else di view apakah voting timenya masih berlaku atau tidak
    // public function submitButtonPressed()
    // {

    // }

    // gaperlu dibuatkan function, seharusnya saat user menekan button langsung memanggil function lain biar efisien
    // bisa dibuat if else di view apakah user sudah login apa belum
    // public function voteButtonPressed()
    // {

    // }

    // bisa dibuat if else di view apakah user sudah login apa belum
    // public function checkUserLogin()
    // {

    // }

    // bisa dibuat if else di view apakah user sudah login apa belum
    // public function checkUserId()
    // {

    // }

}
