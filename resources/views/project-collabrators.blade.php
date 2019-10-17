@extends('layouts.auth')

@section('main-content')
<div class="container">
   
            <div class="container mt-5">
                <h4 class="text-uppercase text-bold mb-5">Collaborators</h4>
                <div class = "content-nav mb-5 d-flex">
                    <a href = "#Overview" class="mr-5">Overview</a>
                    <a href = "#Collaborators" class = "active mr-5">Collaborators</a>
                    <a href = "#Task" class="mr-5">Task</a>
                    <a href = "#Documents">Documents</a>
                </div>

                <div class="table-responsive">
                    <table class="table">
                        <thead class="table-borderless">
                            <tr>
                                <th></th>
                                <th>Name</th>
                                <th>Role</th>
                                <th>Progress</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="mb-3">
                                <td class="bo-r-none"><i class="in-circle">FD</i></td>
                                <td class="bo-r-none bo-l-none">David Speedo</td>
                                <td class="bo-r-none bo-l-none">Product Designer</td>
                                <td class="bo-r-none bo-l-none">58%</td>
                                <td class="bo-l-none">
                                    <div class="vert-dots"></div>
                                </td>
                            </tr>
                            <tr>
                                <td class="bo-r-none"><i class="in-circle">FD</i></td>
                                <td class="bo-r-none bo-l-none">David Speedo</td>
                                <td class="bo-r-none bo-l-none">Product Designer</td>
                                <td class="bo-r-none bo-l-none">58%</td>
                                <td class="bo-l-none">
                                    <div class="vert-dots"></div>
                                </td>
                            </tr>
                            <tr>
                                <td class="bo-r-none"><i class="in-circle">FD</i></td>
                                <td class="bo-r-none bo-l-none">David Speedo</td>
                                <td class="bo-r-none bo-l-none">Product Designer</td>
                                <td class="bo-r-none bo-l-none">58%</td>
                                <td class="bo-l-none">
                                    <div class="vert-dots"></div>
                                </td>
                            </tr>
                            <tr>
                                <td class="bo-r-none"><i class="in-circle">FD</i></td>
                                <td class="bo-r-none bo-l-none">David Speedo</td>
                                <td class="bo-r-none bo-l-none">Product Designer</td>
                                <td class="bo-r-none bo-l-none">58%</td>
                                <td class="bo-l-none">
                                    <div class="vert-dots"></div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
</div> 

@endsection