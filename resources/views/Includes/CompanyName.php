<?php
    $Companies = \App\Models\Organisation::where('CompanyCode', $Car->CompanyCode)
                                        ->first();