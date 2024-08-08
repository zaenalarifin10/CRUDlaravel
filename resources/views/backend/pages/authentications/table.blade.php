
@extends('layouts.app')

@section('content')
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    @if (Session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ Session('success') }}
                    </div>
                    @endif

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Tabel Users</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th><center>No</center></th>
                                            <th><center> Username</center></th>
                                            <th><center>email</center></th>
                                            <th><center>tanggal di buat</center></th>
                                            <th><center>tanggal di updete</center></th>
                                            <th colspan="3"><center>Aksi</center></th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $loop->iteration}}</td>
                                            <td>{{ $user->username }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->created_at }}</td>
                                            <td>{{ $user->updated_at }}</td>

                                                <th><a href="{{route("users.show", $user->id)}}" style="color: white;"><button class="de-button">
                                                    <svg height="122px"  class="de-svgIcon"  version="1.1" viewBox="0 0 150 110" width="150px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><style type="text/css">
                <![CDATA[
                    .st0{fill:#EF3E42;}
                    .st1{fill:#FFFFFF;}
                    .st2{fill:none;}
                    .st3{fill-rule:evenodd;clip-rule:evenodd;fill:#FFFFFF;}
                ]]>
                </style><defs/><path d="M65.7,97.3C36.5,97.3,13.2,80,2.1,53.9c11.2-26.1,34.5-43.4,63.6-43.4c29.1,0,52.5,17.3,63.7,43.4  C118.2,80,94.8,97.3,65.7,97.3L65.7,97.3L65.7,97.3z M65.7,86.9c23.1,0,43-13.5,52.3-33c-9.3-19.5-29.2-33-52.3-33  c-23,0-42.9,13.5-52.2,33C22.7,73.4,42.6,86.9,65.7,86.9L65.7,86.9L65.7,86.9z M41.5,53.9c0-13.4,10.8-24.2,24.1-24.2  c13.4,0,24.2,10.9,24.2,24.2c0,13.4-10.9,24.2-24.2,24.2C52.3,78.1,41.5,67.2,41.5,53.9L41.5,53.9L41.5,53.9z M67.1,47.8  c0,4.2,3.3,7.6,7.6,7.6c4.1,0,7.5-3.4,7.5-7.6c0-4.1-3.3-7.5-7.5-7.5C70.5,40.3,67.1,43.6,67.1,47.8L67.1,47.8L67.1,47.8z"/><rect class="st2" height="122" id="_x3C_Slice_x3E__100_" width="150"/></svg>
                </button></a></th>
                <th >
                                                    <a href="{{route("users.edit", $user->id)}}" style="color: white;"><button class="edit-button">
                  <svg class="edit-svgIcon" viewBox="0 0 512 512">
                                    <path d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"></path>
                                  </svg>
                </button></a>
                                                </th>
                <th>
                    <form action="{{ route('users.hapus', ['id' => $user->id]) }}" method="POST">
                        @csrf
                        @method('delete')
                                                 <button  class="del-button" type="submit">
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 50 59"
                    class="del-svgIcon" viewBox="0 0 512 512"
                  >
                    <path
                      fill="#B5BAC1"
                      d="M0 7.5C0 5.01472 2.01472 3 4.5 3H45.5C47.9853 3 50 5.01472 50 7.5V7.5C50 8.32843 49.3284 9 48.5 9H1.5C0.671571 9 0 8.32843 0 7.5V7.5Z"
                    ></path>
                    <path
                      fill="#B5BAC1"
                      d="M17 3C17 1.34315 18.3431 0 20 0H29.3125C30.9694 0 32.3125 1.34315 32.3125 3V3H17V3Z"
                    ></path>
                    <path
                      fill="#B5BAC1"
                      d="M2.18565 18.0974C2.08466 15.821 3.903 13.9202 6.18172 13.9202H43.8189C46.0976 13.9202 47.916 15.821 47.815 18.0975L46.1699 55.1775C46.0751 57.3155 44.314 59.0002 42.1739 59.0002H7.8268C5.68661 59.0002 3.92559 57.3155 3.83073 55.1775L2.18565 18.0974ZM18.0003 49.5402C16.6196 49.5402 15.5003 48.4209 15.5003 47.0402V24.9602C15.5003 23.5795 16.6196 22.4602 18.0003 22.4602C19.381 22.4602 20.5003 23.5795 20.5003 24.9602V47.0402C20.5003 48.4209 19.381 49.5402 18.0003 49.5402ZM29.5003 47.0402C29.5003 48.4209 30.6196 49.5402 32.0003 49.5402C33.381 49.5402 34.5003 48.4209 34.5003 47.0402V24.9602C34.5003 23.5795 33.381 22.4602 32.0003 22.4602C30.6196 22.4602 29.5003 23.5795 29.5003 24.9602V47.0402Z"
                      clip-rule="evenodd"
                      fill-rule="evenodd"
                    ></path>
                    <path fill="#B5BAC1" d="M2 13H48L47.6742 21.28H2.32031L2 13Z"></path>
                  </svg>

                  <span class="tooltip">Delete</span>
                </button></form>



                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            @endsection
