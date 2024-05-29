<?php

namespace App\Http\Controllers;

use App\Models\CandidateModel;
use App\Models\ElectionModel;
use App\Models\User;
use App\Models\VoteModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Exception;

class ElectionModelController extends Controller
{
    // mengambil data election dengan detail
    public function getElectionData($electionId)
    {
        try {
            $electionData = ElectionModel::findOrFail($electionId);
            return view('', [
                'electionData' => $electionData
            ]);
        }
        catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    // melakukan pengecekkan apakah user dengan id sekian sudah vote di election dengan id sekian
    public function processVote($electionId, $userId)
    {
        $hasVoted = VoteModel::where('user_id', $userId, 'election_id', $electionId)
            ->where('election_id', $electionId)
            ->first();

        if ($hasVoted) {
            return redirect()->back()->with('error', 'You have already voted');
        }
        else {
            return $this->createVote($electionId, $userId);
        }
    }

    // mendapatkan data detail mengenai candidate
    public function getCandidateDetail($electionId)
    {
        try {
            $candidateDetail = CandidateModel::findOrFail($electionId);
            return view('' . [
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
            $candidate->voteCount = $candidate->vote_count + 1;
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

        try {
            $electionData = ElectionModel::findOrFail($electionId);
            $userData = User::findOrFail($userId);
            $vote = new VoteModel();
            $vote->election_id = $electionId;
            $vote->user_id = $userId;
            $vote->voteTime = $nowJakarta;
            $vote->save();

            return view('', [
                'electionData' => $electionData,
                'userData' => $userData
            ]);
        }
        catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    // mengambil data waktu voting
    public function getVotingTime($electionId)
    {
        try {
            $votingTimeStart = ElectionModel::findOrFail($electionId)->timeStart;
            $votingTimeEnd = ElectionModel::findOrFail($electionId)->timeEnd;
            return view('', [
                'votingTimeStart' => $votingTimeStart,
                'votingTimeEnd' => $votingTimeEnd,
            ]);
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
