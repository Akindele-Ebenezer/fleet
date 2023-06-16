@extends('Layouts.Layout2')

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
            @unless (count($Cars) > 0)
            <tr>
                <td>No documents available.</td>
            </tr>    
            @endunless
            @foreach ($Cars as $Document)
            @php
                $CarDocuments_REGISTRATION_CERTIFICATE = \DB::table('car_documents')->select(['VehicleNumber', 'RegistrationCertificate', 'RegistrationCertificateSize'])->where('VehicleNumber', $Document->VehicleNumber)->get();
                $CarDocuments_DRIVING_LICENCE = \DB::table('car_documents')->select(['VehicleNumber', 'DrivingLicence', 'DrivingLicenceSize'])->where('VehicleNumber', $Document->VehicleNumber)->get();
                $CarDocuments_PUC_CERTIFICATE = \DB::table('car_documents')->select(['VehicleNumber', 'PUCCertificate', 'PUCCertificateSize'])->where('VehicleNumber', $Document->VehicleNumber)->get();
                $CarDocuments_PROOF_OF_OWNERSHIP = \DB::table('car_documents')->select(['VehicleNumber', 'ProofOfOwnership', 'ProofOfOwnershipSize'])->where('VehicleNumber', $Document->VehicleNumber)->get();
                $CarDocuments_CERTIFICATE_OF_ROAD_WORTHINESS = \DB::table('car_documents')->select(['VehicleNumber', 'CertificateOfRoadWorthiness', 'CertificateOfRoadWorthinessSize'])->where('VehicleNumber', $Document->VehicleNumber)->get();
                $CarDocuments_INSURANCE_CERTIFICATE = \DB::table('car_documents')->select(['VehicleNumber', 'InsuranceCertificate', 'InsuranceCertificateSize'])->where('VehicleNumber', $Document->VehicleNumber)->get();
            @endphp   
            <tr class="tr-x">
                <td class="td-x">
                    <div class="x-inner">
                        <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48"><path d="M309 435q12 0 21-9t9-21q0-12-9-21t-21-9q-12 0-21 9t-9 21q0 12 9 21t21 9Zm0 171q12 0 21-9t9-21q0-12-9-21t-21-9q-12 0-21 9t-9 21q0 12 9 21t21 9Zm0 171q12 0 21-9t9-21q0-12-9-21t-21-9q-12 0-21 9t-9 21q0 12 9 21t21 9ZM180 936q-24 0-42-18t-18-42V276q0-24 18-42t42-18h462l198 198v462q0 24-18 42t-42 18H180Zm0-60h600V447.429H609V276H180v600Zm0-600v171.429V276v600-600Z"></path></svg> {{ $Document->VehicleNumber }}
                    </div> 
                </td>
                <td>
                    <small>{{ $Document->GearType }}</small> <br>
                    <span class="{{ $Document->Status  === 'ACTIVE' ? 'active-x' : 'inactive-x' }}">{{ $Document->Status }}</span>  
                </td>
                <td>
                    {{ $Document->Driver }} 
                </td>
                <td>
                    {{ $Document->PurchaseDate }} 
                </td>
                <td>  
                    <button class="action-x manage-document">MANAGE</button>
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
                <td>
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
                    @foreach ($CarDocuments_PUC_CERTIFICATE as $Document_)
                        <div class="document">
                            @if (empty($Document_->PUCCertificate))
                                <p>No File..</p>
                            @endif
                            <a href="/Documents/Cars/{{ $Document->VehicleNumber }}/{{ $Document_->PUCCertificate }}" target="blank">
                                {{ $Document_->PUCCertificate }}
                            </a>
                            <button class="action-x delete-document-btn">Delete</button>
                            <span class="Hide">{{ $Document_->VehicleNumber }}</span>
                            <span class="Hide">{{ $Document_->PUCCertificate }}</span>
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
                <td>
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
                    @foreach ($CarDocuments_PUC_CERTIFICATE as $Document_)
                        <div class="document">
                            <span> {{ round($Document_->PUCCertificateSize) }} KB</span>
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
                <td>
                    @foreach ($CarDocuments_REGISTRATION_CERTIFICATE as $Document_)
                        <div class="document">
                                Registration Certificate
                        </div>
                    @endforeach  
                    @foreach ($CarDocuments_DRIVING_LICENCE as $Document_)
                        <div class="document">
                                Driving Licence
                        </div>
                    @endforeach  
                    @foreach ($CarDocuments_PUC_CERTIFICATE as $Document_)
                        <div class="document">
                            PUC Certificate
                        </div>
                    @endforeach  
                    @foreach ($CarDocuments_PROOF_OF_OWNERSHIP as $Document_)
                        <div class="document">
                            Proof Of Ownership
                        </div>
                    @endforeach  
                    @foreach ($CarDocuments_CERTIFICATE_OF_ROAD_WORTHINESS as $Document_)
                        <div class="document">
                            Certificate Of Road Worthiness
                        </div>
                    @endforeach  
                    @foreach ($CarDocuments_INSURANCE_CERTIFICATE as $Document_)
                        <div class="document">
                            Insurance Certificate
                        </div>
                    @endforeach
                </td>
                <td>  
                    {{ $Document->PurchaseDate }} <br>
                </td>
            </tr>
            @endforeach
        </table>
        {{ $Cars->onEachSide(5)->links() }}
        @unless (count($Cars) > 0)
        @include('Includes.EmptyProjectTemplate') 
        @endunless
    </div>
@endsection