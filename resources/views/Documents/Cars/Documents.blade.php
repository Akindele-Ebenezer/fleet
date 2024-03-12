@extends('Layouts.Layout2')

@section('Title', 'DOCUMENTS') 
@section('Heading', 'DOCUMENTS') 

@include('Components.EditCarDocumentComponent')
@section('Content')
    <div class="table-wrapper"> 
        <table class="table" id="Table">
            <tr class="table-head"> 
                <th onclick="sortTable(0)">Vehicle Number</th>
                <th onclick="sortTable(1)">Status</th>
                <th onclick="sortTable(2)">Driver</th>
                <th onclick="sortTable(3)">Purchase Date</th> 
                <th onclick="sortTable(3)"></th> 
            </tr>  
            @php 
                $DocumentManagement_USER = \DB::table('user_privileges')
                                                ->select('DocumentManagement')
                                                ->where('UserId', session()->get('Id'))
                                                ->first();  
 
                if (isset($_GET['UpToDate'])) {
                    $Cars = \DB::table('cars')->whereNotNull('VehicleNumber')->where('LicenceExpiryDate', '>', date('Y-m-d'))->orderBy('PurchaseDate', 'DESC')->paginate(14);
                    $Cars->withPath($_SERVER['REQUEST_URI']);       
                }
                if (isset($_GET['Expired'])) {
                    $Cars = \DB::table('cars')->whereNotNull(['VehicleNumber', 'LicenceExpiryDate'])->where('LicenceExpiryDate', '<', date('Y-m-d'))->orderBy('PurchaseDate', 'DESC')->paginate(14);
                    $Cars->withPath($_SERVER['REQUEST_URI']);       
                }
                if (isset($_GET['NotRegistered'])) {
                    $Cars = \DB::table('cars')->whereNotNull('VehicleNumber')->whereNull('LicenceExpiryDate')->orderBy('PurchaseDate', 'DESC')->paginate(14);
                    $Cars->withPath($_SERVER['REQUEST_URI']);       
                } 
            @endphp
            @unless (count($Cars) > 0)
            <tr>
                <td>No documents available.</td>
            </tr>    
            @endunless
            @foreach ($Cars as $Document)
            @php 
                $CarDocuments_REGISTRATION_CERTIFICATE = \DB::table('car_documents')->select(['VehicleNumber', 'RegistrationCertificate', 'RegistrationCertificateSize'])->where('VehicleNumber', $Document->VehicleNumber)->groupBy('VehicleNumber')->get();
                $CarDocuments_DRIVING_LICENCE = \DB::table('car_documents')->select(['VehicleNumber', 'DrivingLicence', 'DrivingLicenceSize'])->where('VehicleNumber', $Document->VehicleNumber)->groupBy('VehicleNumber')->get();
                $CarDocuments_CENTRAL_MOTOR_REGISTRY = \DB::table('car_documents')->select(['VehicleNumber', 'CentralMotorRegistry', 'CentralMotorRegistrySize'])->where('VehicleNumber', $Document->VehicleNumber)->groupBy('VehicleNumber')->get();
                $CarDocuments_PROOF_OF_OWNERSHIP = \DB::table('car_documents')->select(['VehicleNumber', 'ProofOfOwnership', 'ProofOfOwnershipSize'])->where('VehicleNumber', $Document->VehicleNumber)->groupBy('VehicleNumber')->get();
                $CarDocuments_CERTIFICATE_OF_ROAD_WORTHINESS = \DB::table('car_documents')->select(['VehicleNumber', 'CertificateOfRoadWorthiness', 'CertificateOfRoadWorthinessSize'])->where('VehicleNumber', $Document->VehicleNumber)->groupBy('VehicleNumber')->get();
                $CarDocuments_INSURANCE_CERTIFICATE = \DB::table('car_documents')->select(['VehicleNumber', 'InsuranceCertificate', 'InsuranceCertificateSize'])->where('VehicleNumber', $Document->VehicleNumber)->groupBy('VehicleNumber')->get();
            @endphp   
            <tr class="tr-x">
                <td class="td-x">
                    <div class="x-inner">
                        <img src="{{ asset('Images/folder.png') }}" alt=""> {{ $Document->VehicleNumber }}
                    </div> 
                </td>
                <td>
                    <small class="gear-type-x underline">{{ $Document->GearType }}</small> <br>
                    <span class="{{ $Document->Status  === 'ACTIVE' ? 'active-x' : 'inactive-x' }}">{{ $Document->Status }}</span>  
                </td>
                <td class="drivers-x underline">
                    {{ $Document->Driver }} 
                </td>
                <td>
                    {{ $Document->PurchaseDate }} 
                </td>
                <td>  
                    <button class="action-x {{ $DocumentManagement_USER->DocumentManagement ?? 'off' === 'on' ? 'manage-document' : 'permission-denied' }}">MANAGE</button>
                    <span class="Hide">{{ $Document->VehicleNumber }}</span>
                    <span class="Hide">{{ $Document->id }}</span>
                </td>
            </tr>  
            <tr class="table-head Hide"> 
                <th onclick="sortTable(0)">Name</th>
                <th onclick="sortTable(1)">File Size</th>
                <th onclick="sortTable(2)">Type</th>
                <th onclick="sortTable(3)">Purchase Date</th> 
            </tr>  
            <tr class="Hide">
                <td class="td-2"> 
                    @if (
                        (count($CarDocuments_REGISTRATION_CERTIFICATE) < 1) AND
                        (count($CarDocuments_DRIVING_LICENCE) < 1) AND
                        (count($CarDocuments_PUC_CERTIFICATE) < 1) AND
                        (count($CarDocuments_PROOF_OF_OWNERSHIP) < 1) AND
                        (count($CarDocuments_CERTIFICATE_OF_ROAD_WORTHINESS) < 1) AND
                        (count($CarDocuments_INSURANCE_CERTIFICATE) < 1)
                    )
                        <div class="document">
                            <span>No files..</span>
                        </div> 
                    @endif 
                    @foreach ($CarDocuments_REGISTRATION_CERTIFICATE as $Document_) 
                        <div class="document">
                            @if (empty($Document_->RegistrationCertificate))
                                <p>No File..</p>
                            @endif
                            <a href="/Documents/Cars/{{ $Document->VehicleNumber }}/{{ $Document_->RegistrationCertificate }}" target="blank">
                                {{ $Document_->RegistrationCertificate }}
                            </a>
                            <button class="action-x delete-document-btn">Delete</button>
                            <span class="Hide">{{ $Document_->VehicleNumber }}</span>
                            <span class="Hide">{{ $Document_->RegistrationCertificate }}</span>
                        </div>
                    @endforeach
                    @foreach ($CarDocuments_DRIVING_LICENCE as $Document_)
                        <div class="document">
                            @if (empty($Document_->DrivingLicence))
                                <p>No File..</p>
                            @endif
                            <a href="/Documents/Cars/{{ $Document->VehicleNumber }}/{{ $Document_->DrivingLicence }}" target="blank">
                                {{ $Document_->DrivingLicence }}
                            </a>
                            <button class="action-x delete-document-btn">Delete</button>
                            <span class="Hide">{{ $Document_->VehicleNumber }}</span>
                            <span class="Hide">{{ $Document_->DrivingLicence }}</span>
                        </div>
                    @endforeach
                    @foreach ($CarDocuments_CENTRAL_MOTOR_REGISTRY as $Document_)
                        <div class="document">
                            @if (empty($Document_->CentralMotorRegistry))
                                <p>No File..</p>
                            @endif
                            <a href="/Documents/Cars/{{ $Document->VehicleNumber }}/{{ $Document_->CentralMotorRegistry }}" target="blank">
                                {{ $Document_->CentralMotorRegistry }}
                            </a>
                            <button class="action-x delete-document-btn">Delete</button>
                            <span class="Hide">{{ $Document_->VehicleNumber }}</span>
                            <span class="Hide">{{ $Document_->CentralMotorRegistry }}</span>
                        </div>
                    @endforeach
                    @foreach ($CarDocuments_PROOF_OF_OWNERSHIP as $Document_)
                        <div class="document">
                            @if (empty($Document_->ProofOfOwnership))
                                <p>No File..</p>
                            @endif
                            <a href="/Documents/Cars/{{ $Document->VehicleNumber }}/{{ $Document_->ProofOfOwnership }}" target="blank">
                                {{ $Document_->ProofOfOwnership }}
                            </a>
                            <button class="action-x delete-document-btn">Delete</button>
                            <span class="Hide">{{ $Document_->VehicleNumber }}</span>
                            <span class="Hide">{{ $Document_->ProofOfOwnership }}</span>
                        </div>
                    @endforeach
                    @foreach ($CarDocuments_CERTIFICATE_OF_ROAD_WORTHINESS as $Document_)
                        <div class="document">
                            @if (empty($Document_->CertificateOfRoadWorthiness))
                                <p>No File..</p>
                            @endif
                            <a href="/Documents/Cars/{{ $Document->VehicleNumber }}/{{ $Document_->CertificateOfRoadWorthiness }}" target="blank">
                                {{ $Document_->CertificateOfRoadWorthiness }}
                            </a>
                            <button class="action-x delete-document-btn">Delete</button>
                            <span class="Hide">{{ $Document_->VehicleNumber }}</span>
                            <span class="Hide">{{ $Document_->CertificateOfRoadWorthiness }}</span>
                        </div>
                    @endforeach
                    @foreach ($CarDocuments_INSURANCE_CERTIFICATE as $Document_)
                        <div class="document">
                            @if (empty($Document_->InsuranceCertificate))
                                <p>No File..</p>
                            @endif
                            <a href="/Documents/Cars/{{ $Document->VehicleNumber }}/{{ $Document_->InsuranceCertificate }}" target="blank">
                                {{ $Document_->InsuranceCertificate }}
                            </a>
                            <button class="action-x delete-document-btn">Delete</button>
                            <span class="Hide">{{ $Document_->VehicleNumber }}</span>
                            <span class="Hide">{{ $Document_->InsuranceCertificate }}</span>
                        </div>
                    @endforeach
                </td>
                <td class="td-2">
                    @foreach ($CarDocuments_REGISTRATION_CERTIFICATE as $Document_)
                        <div class="document">
                            <span>{{ round($Document_->RegistrationCertificateSize) }} KB</span>
                        </div> 
                    @endforeach 
                    @foreach ($CarDocuments_DRIVING_LICENCE as $Document_)
                        <div class="document">
                            <span>{{ round($Document_->DrivingLicenceSize) }} KB</span>
                        </div>
                    @endforeach 
                    @foreach ($CarDocuments_CENTRAL_MOTOR_REGISTRY as $Document_)
                        <div class="document">
                            <span> {{ round($Document_->CentralMotorRegistrySize) }} KB</span>
                        </div>
                    @endforeach 
                    @foreach ($CarDocuments_PROOF_OF_OWNERSHIP as $Document_)
                        <div class="document">
                            <span>{{ round($Document_->ProofOfOwnershipSize) }} KB</span>
                        </div>
                    @endforeach 
                    @foreach ($CarDocuments_CERTIFICATE_OF_ROAD_WORTHINESS as $Document_)
                        <div class="document">
                            <span> {{ round($Document_->CertificateOfRoadWorthinessSize) }} KB</span>
                        </div>
                    @endforeach 
                    @foreach ($CarDocuments_INSURANCE_CERTIFICATE as $Document_)
                        <div class="document">
                                <span>{{ round($Document_->InsuranceCertificateSize) }} KB</span>
                        </div>
                    @endforeach
                </td>
                <td class="td-2 DocumentType">
                    @foreach ($CarDocuments_REGISTRATION_CERTIFICATE as $Document_)
                        @php
                            $DriverLicenseExpiryDate = \DB::table('car_documents')->select(['DriverLicenseExpiryDate'])->where('VehicleNumber', $Document->VehicleNumber)->first();
                        @endphp
                        <div class="document">
                            <span>Driver's License</span> <span>{{ $DriverLicenseExpiryDate->DriverLicenseExpiryDate }}</span> <span class="@if ($DriverLicenseExpiryDate->DriverLicenseExpiryDate < date('Y-m-d') AND !empty($DriverLicenseExpiryDate->DriverLicenseExpiryDate)) expired @endif {{ empty($DriverLicenseExpiryDate->DriverLicenseExpiryDate) ? 'not-registered' : '' }} {{ $DriverLicenseExpiryDate->DriverLicenseExpiryDate > date('Y-m-d') ? 'up-to-date' : '' }}">
                                @if (empty($DriverLicenseExpiryDate->DriverLicenseExpiryDate))
                                    not-registered
                                @endif
                                @if ($DriverLicenseExpiryDate->DriverLicenseExpiryDate < date('Y-m-d') AND !empty($DriverLicenseExpiryDate->DriverLicenseExpiryDate))
                                    expired 
                                @endif
                                @if ($DriverLicenseExpiryDate->DriverLicenseExpiryDate > date('Y-m-d'))
                                    up-to-date
                                @endif
                        </div>
                    @endforeach  
                    @foreach ($CarDocuments_DRIVING_LICENCE as $Document_)
                        @php
                            $VehicleLicense = \DB::table('cars')->select(['VehicleNumber', 'LicenceExpiryDate'])->where('VehicleNumber', $Document->VehicleNumber)->first();
                            $VehicleLicenseExpiryDate = \DB::table('car_documents')->select(['VehicleLicenseExpiryDate'])->where('VehicleNumber', $Document->VehicleNumber)->first();
                        @endphp
                        <div class="document VehicleLicense">
                            <span>Vehicle License</span> <span>{{ $VehicleLicenseExpiryDate->VehicleLicenseExpiryDate }}</span> <span class="@if ($VehicleLicenseExpiryDate->VehicleLicenseExpiryDate < date('Y-m-d') AND !empty($VehicleLicenseExpiryDate->VehicleLicenseExpiryDate)) expired @endif {{ empty($VehicleLicenseExpiryDate->VehicleLicenseExpiryDate) ? 'not-registered' : '' }} {{ $VehicleLicenseExpiryDate->VehicleLicenseExpiryDate > date('Y-m-d') ? 'up-to-date' : '' }}">
                                @if (empty($VehicleLicenseExpiryDate->VehicleLicenseExpiryDate))
                                    not-registered
                                @endif
                                @if ($VehicleLicenseExpiryDate->VehicleLicenseExpiryDate < date('Y-m-d') AND !empty($VehicleLicenseExpiryDate->VehicleLicenseExpiryDate))
                                    expired 
                                @endif
                                @if ($VehicleLicenseExpiryDate->VehicleLicenseExpiryDate > date('Y-m-d'))
                                    up-to-date
                                @endif
                        </div>
                    @endforeach   
                    @foreach ($CarDocuments_CENTRAL_MOTOR_REGISTRY as $Document_)
                        @php 
                            $CentralMotorRegistryExpiryDate = \DB::table('car_documents')->select(['CentralMotorRegistryExpiryDate'])->where('VehicleNumber', $Document->VehicleNumber)->first();
                        @endphp
                        <div class="document CentralMotorRegistry">
                            <span>Central Motor Registry</span> <span>{{ $CentralMotorRegistryExpiryDate->CentralMotorRegistryExpiryDate }}</span> <span class="@if ($CentralMotorRegistryExpiryDate->CentralMotorRegistryExpiryDate < date('Y-m-d') AND !empty($CentralMotorRegistryExpiryDate->CentralMotorRegistryExpiryDate)) expired @endif {{ empty($CentralMotorRegistryExpiryDate->CentralMotorRegistryExpiryDate) ? 'not-registered' : '' }} {{ $CentralMotorRegistryExpiryDate->CentralMotorRegistryExpiryDate > date('Y-m-d') ? 'up-to-date' : '' }}">
                                @if (empty($CentralMotorRegistryExpiryDate->CentralMotorRegistryExpiryDate))
                                    not-registered
                                @endif
                                @if ($CentralMotorRegistryExpiryDate->CentralMotorRegistryExpiryDate < date('Y-m-d') AND !empty($CentralMotorRegistryExpiryDate->CentralMotorRegistryExpiryDate))
                                    expired 
                                @endif
                                @if ($CentralMotorRegistryExpiryDate->CentralMotorRegistryExpiryDate > date('Y-m-d'))
                                    up-to-date
                                @endif
                        </div>
                    @endforeach   
                    @foreach ($CarDocuments_PROOF_OF_OWNERSHIP as $Document_)
                        @php
                            $ProofOfOwnershipExpiryDate = \DB::table('car_documents')->select(['ProofOfOwnershipExpiryDate'])->where('VehicleNumber', $Document->VehicleNumber)->first();
                        @endphp
                        <div class="document">
                            <span>Proof Of Ownership</span>  <span>{{ $ProofOfOwnershipExpiryDate->ProofOfOwnershipExpiryDate }}</span><span class="@if ($ProofOfOwnershipExpiryDate->ProofOfOwnershipExpiryDate < date('Y-m-d') AND !empty($ProofOfOwnershipExpiryDate->ProofOfOwnershipExpiryDate)) expired @endif {{ empty($ProofOfOwnershipExpiryDate->ProofOfOwnershipExpiryDate) ? 'not-registered' : '' }} {{ $ProofOfOwnershipExpiryDate->ProofOfOwnershipExpiryDate > date('Y-m-d') ? 'up-to-date' : '' }}">
                                @if (empty($ProofOfOwnershipExpiryDate->ProofOfOwnershipExpiryDate))
                                    not-registered
                                @endif
                                @if ($ProofOfOwnershipExpiryDate->ProofOfOwnershipExpiryDate < date('Y-m-d') AND !empty($ProofOfOwnershipExpiryDate->ProofOfOwnershipExpiryDate))
                                    expired 
                                @endif
                                @if ($ProofOfOwnershipExpiryDate->ProofOfOwnershipExpiryDate > date('Y-m-d'))
                                    up-to-date
                                @endif
                        </div>
                    @endforeach  
                    @foreach ($CarDocuments_CERTIFICATE_OF_ROAD_WORTHINESS as $Document_)
                        @php
                            $CertificateOfRoadWorthinessExpiryDate = \DB::table('car_documents')->select(['CertificateOfRoadWorthinessExpiryDate'])->where('VehicleNumber', $Document->VehicleNumber)->first();
                        @endphp
                        <div class="document">
                            <span>Certificate Of Road Worthiness</span>  <span>{{ $CertificateOfRoadWorthinessExpiryDate->CertificateOfRoadWorthinessExpiryDate }}</span><span class="@if ($CertificateOfRoadWorthinessExpiryDate->CertificateOfRoadWorthinessExpiryDate < date('Y-m-d') AND !empty($CertificateOfRoadWorthinessExpiryDate->CertificateOfRoadWorthinessExpiryDate)) expired @endif {{ empty($CertificateOfRoadWorthinessExpiryDate->CertificateOfRoadWorthinessExpiryDate) ? 'not-registered' : '' }} {{ $CertificateOfRoadWorthinessExpiryDate->CertificateOfRoadWorthinessExpiryDate > date('Y-m-d') ? 'up-to-date' : '' }}">
                                @if (empty($CertificateOfRoadWorthinessExpiryDate->CertificateOfRoadWorthinessExpiryDate))
                                    not-registered
                                @endif
                                @if ($CertificateOfRoadWorthinessExpiryDate->CertificateOfRoadWorthinessExpiryDate < date('Y-m-d') AND !empty($CertificateOfRoadWorthinessExpiryDate->CertificateOfRoadWorthinessExpiryDate))
                                    expired 
                                @endif
                                @if ($CertificateOfRoadWorthinessExpiryDate->CertificateOfRoadWorthinessExpiryDate > date('Y-m-d'))
                                    up-to-date
                                @endif
                        </div>
                    @endforeach  
                    @foreach ($CarDocuments_INSURANCE_CERTIFICATE as $Document_)
                        @php
                            $InsuranceCertificateExpiryDate = \DB::table('car_documents')->select(['InsuranceCertificateExpiryDate'])->where('VehicleNumber', $Document->VehicleNumber)->first();
                        @endphp
                        <div class="document">
                            <span>Insurance Certificate</span>  <span>{{ $InsuranceCertificateExpiryDate->InsuranceCertificateExpiryDate }}</span><span class="@if ($InsuranceCertificateExpiryDate->InsuranceCertificateExpiryDate < date('Y-m-d') AND !empty($InsuranceCertificateExpiryDate->InsuranceCertificateExpiryDate)) expired @endif {{ empty($InsuranceCertificateExpiryDate->InsuranceCertificateExpiryDate) ? 'not-registered' : '' }} {{ $InsuranceCertificateExpiryDate->InsuranceCertificateExpiryDate > date('Y-m-d') ? 'up-to-date' : '' }}">
                                @if (empty($InsuranceCertificateExpiryDate->InsuranceCertificateExpiryDate))
                                    not-registered
                                @endif
                                @if ($InsuranceCertificateExpiryDate->InsuranceCertificateExpiryDate < date('Y-m-d') AND !empty($InsuranceCertificateExpiryDate->InsuranceCertificateExpiryDate))
                                    expired 
                                @endif
                                @if ($InsuranceCertificateExpiryDate->InsuranceCertificateExpiryDate > date('Y-m-d'))
                                    up-to-date
                                @endif
                        </div>
                    @endforeach
                </td>
                <td class="td-2">  
                    {{ $Document->PurchaseDate }} <br>
                </td>
            </tr>
            @endforeach
        </table>
        @unless (count($Cars) > 0)
        @include('Includes.EmptyProjectTemplate') 
        @endunless
    </div>
    {{ $Cars->onEachSide(5)->links() }}
    <script src="{{ asset('Js/Edit/Documents/Cars.js') }}"></script>
    <script>
        let ExportButton = document.querySelector('.ExportToExcel');
        ExportButton.addEventListener('click', () => {
            window.location = '/Deposits/Export'; 
        });
    </script>
@endsection
