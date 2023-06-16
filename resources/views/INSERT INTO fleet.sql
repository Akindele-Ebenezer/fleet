 INSERT INTO fleet.car_documents (`VehicleNumber`) VALUES ('');
INSERT INTO fleet.car_documents (`VehicleNumber`) VALUES ('AGL 247EH');
INSERT INTO fleet.car_documents (`VehicleNumber`) VALUES ('AGL782 FB');
INSERT INTO fleet.car_documents (`VehicleNumber`) VALUES ('AKD 487FN');
INSERT INTO fleet.car_documents (`VehicleNumber`) VALUES ('AKD821DL');
INSERT INTO fleet.car_documents (`VehicleNumber`) VALUES ('APP 547 HK');
INSERT INTO fleet.car_documents (`VehicleNumber`) VALUES ('APP 631 HJ');
INSERT INTO fleet.car_documents (`VehicleNumber`) VALUES ('APP119CV');
INSERT INTO fleet.car_documents (`VehicleNumber`) VALUES ('BDG 322 HP');
INSERT INTO fleet.car_documents (`VehicleNumber`) VALUES ('EPE 193 FW');
INSERT INTO fleet.car_documents (`VehicleNumber`) VALUES ('EPE 742 HY');
INSERT INTO fleet.car_documents (`VehicleNumber`) VALUES ('EPE546DS');
INSERT INTO fleet.car_documents (`VehicleNumber`) VALUES ('EPE897EX');
INSERT INTO fleet.car_documents (`VehicleNumber`) VALUES ('EPE931HS');
INSERT INTO fleet.car_documents (`VehicleNumber`) VALUES ('EPE944AT');
INSERT INTO fleet.car_documents (`VehicleNumber`) VALUES ('EPE948AT');
INSERT INTO fleet.car_documents (`VehicleNumber`) VALUES ('FKJ 987 FT');
INSERT INTO fleet.car_documents (`VehicleNumber`) VALUES ('FKJ 999 GP');
INSERT INTO fleet.car_documents (`VehicleNumber`) VALUES ('FKJ415CW');
INSERT INTO fleet.car_documents (`VehicleNumber`) VALUES ('FST 49 FT');
INSERT INTO fleet.car_documents (`VehicleNumber`) VALUES ('FST183AA');
INSERT INTO fleet.car_documents (`VehicleNumber`) VALUES ('FST581FF');
INSERT INTO fleet.car_documents (`VehicleNumber`) VALUES ('GGE 753 HF');
INSERT INTO fleet.car_documents (`VehicleNumber`) VALUES ('GGE 754 HF');
INSERT INTO fleet.car_documents (`VehicleNumber`) VALUES ('GGE137AZ');
INSERT INTO fleet.car_documents (`VehicleNumber`) VALUES ('GGE501DE');
INSERT INTO fleet.car_documents (`VehicleNumber`) VALUES ('GGE835GY');
INSERT INTO fleet.car_documents (`VehicleNumber`) VALUES ('GWA 971 LQ');
INSERT INTO fleet.car_documents (`VehicleNumber`) VALUES ('JJJ248DX');
INSERT INTO fleet.car_documents (`VehicleNumber`) VALUES ('KJA 787 HG');
INSERT INTO fleet.car_documents (`VehicleNumber`) VALUES ('KJA733EQ');
INSERT INTO fleet.car_documents (`VehicleNumber`) VALUES ('KRD 236 CB');
INSERT INTO fleet.car_documents (`VehicleNumber`) VALUES ('KRD 343AS');
INSERT INTO fleet.car_documents (`VehicleNumber`) VALUES ('KRD235CB');
INSERT INTO fleet.car_documents (`VehicleNumber`) VALUES ('KRD236CB');
INSERT INTO fleet.car_documents (`VehicleNumber`) VALUES ('KRD237CB');
INSERT INTO fleet.car_documents (`VehicleNumber`) VALUES ('KRD238CB');
INSERT INTO fleet.car_documents (`VehicleNumber`) VALUES ('KRD343AS');
INSERT INTO fleet.car_documents (`VehicleNumber`) VALUES ('KRD344AS');
INSERT INTO fleet.car_documents (`VehicleNumber`) VALUES ('KRD346AS');
INSERT INTO fleet.car_documents (`VehicleNumber`) VALUES ('KRD767DL');
INSERT INTO fleet.car_documents (`VehicleNumber`) VALUES ('KSF121EU');
INSERT INTO fleet.car_documents (`VehicleNumber`) VALUES ('KSF122EU');
INSERT INTO fleet.car_documents (`VehicleNumber`) VALUES ('KSF123EU');
INSERT INTO fleet.car_documents (`VehicleNumber`) VALUES ('KSF289AT');
INSERT INTO fleet.car_documents (`VehicleNumber`) VALUES ('KSF290AT');
INSERT INTO fleet.car_documents (`VehicleNumber`) VALUES ('KSF481EY');
INSERT INTO fleet.car_documents (`VehicleNumber`) VALUES ('KSF653AT');
INSERT INTO fleet.car_documents (`VehicleNumber`) VALUES ('KSF704 FB');
INSERT INTO fleet.car_documents (`VehicleNumber`) VALUES ('KSF705FB');
INSERT INTO fleet.car_documents (`VehicleNumber`) VALUES ('KSF706 FB');
INSERT INTO fleet.car_documents (`VehicleNumber`) VALUES ('KTU 999 HE');
INSERT INTO fleet.car_documents (`VehicleNumber`) VALUES ('KWL607AS');
INSERT INTO fleet.car_documents (`VehicleNumber`) VALUES ('KWL608AS');
INSERT INTO fleet.car_documents (`VehicleNumber`) VALUES ('KWL609AS');
INSERT INTO fleet.car_documents (`VehicleNumber`) VALUES ('LND368CX');
INSERT INTO fleet.car_documents (`VehicleNumber`) VALUES ('LND808BT');
INSERT INTO fleet.car_documents (`VehicleNumber`) VALUES ('LSD 70 FS');
INSERT INTO fleet.car_documents (`VehicleNumber`) VALUES ('LSD 723 HE');
INSERT INTO fleet.car_documents (`VehicleNumber`) VALUES ('LSD 879 HF');
INSERT INTO fleet.car_documents (`VehicleNumber`) VALUES ('LSD 925 HR');
INSERT INTO fleet.car_documents (`VehicleNumber`) VALUES ('LSD245CX');
INSERT INTO fleet.car_documents (`VehicleNumber`) VALUES ('LSR268EG');
INSERT INTO fleet.car_documents (`VehicleNumber`) VALUES ('LSR269EG');
INSERT INTO fleet.car_documents (`VehicleNumber`) VALUES ('LSR457FX');
INSERT INTO fleet.car_documents (`VehicleNumber`) VALUES ('MUS 206 GA');
INSERT INTO fleet.car_documents (`VehicleNumber`) VALUES ('MUS 954 HU');
INSERT INTO fleet.car_documents (`VehicleNumber`) VALUES ('MUS641AT');
INSERT INTO fleet.car_documents (`VehicleNumber`) VALUES ('MUS644AT');
INSERT INTO fleet.car_documents (`VehicleNumber`) VALUES ('MUS647AT');
INSERT INTO fleet.car_documents (`VehicleNumber`) VALUES ('MUS648AT');
INSERT INTO fleet.car_documents (`VehicleNumber`) VALUES ('MUS71AW');
INSERT INTO fleet.car_documents (`VehicleNumber`) VALUES ('MUS991AR');
INSERT INTO fleet.car_documents (`VehicleNumber`) VALUES ('SMK625AR');
INSERT INTO fleet.car_documents (`VehicleNumber`) VALUES ('SMK626AR');
INSERT INTO fleet.car_documents (`VehicleNumber`) VALUES ('SMK776HG');
INSERT INTO fleet.car_documents (`VehicleNumber`) VALUES ('SMK924EW');
INSERT INTO fleet.car_documents (`VehicleNumber`) VALUES ('SMK931EW');

-- SELECT FROM SERVER
SELECT `CARNO`, `MAKER`, `MODEL`, `SUBMODEL`, `GEARTP`, `ENGINETP`, `ENGNO`, `CHASSISNO`, 
`PRYEAR`, `ENGVOL`, `COMMENTS`, `PIC`, `DATEP`, `AMTP`, `USERIN`, `DATEIN`, `TIMEIN`, `SUPNO`, 
`CAROWNER`, `DRIVER`, `CARDNO`, `MONBGT`, `ORG`, `TOTDEPOSIT`, `TOTRFL`, `TOTRFLCAR`, `BAL`, 
`PCODE`, `TOTMASTER`, `gSTATUS`, `STOPD`, `LICENCED`, `INSURD`, `FIN`, `capacity`
FROM vfleet.cars;

-- CARS
INSERT INTO fleet.cars (`VehicleNumber`, `Maker`, `Model`, `SubModel`, `GearType`, `EngineType`, `EngineNumber`, `ChassisNumber`, `ModelYear`, `EngineVolume`, `Comments`, `PIC`, `PurchaseDate`, `Price`, `UserId`, `DateIn`, `TimeIn`, `Supplier`, `CarOwner`, `Driver`, `CardNumber`, `MonthlyBudget`, `CompanyCode`, `TotalDeposits`, `TotalRefueling`, `TotalRefuelingCar`, `Balance`, `PinCode`, `TotalMaster`, `Status`, `StopDate`, `LicenceExpiryDate`, `InsuranceExpiryDate`, `FIN`, `FuelTankCapacity`)

-- DEPOSITS 
INSERT INTO fleet.deposits (`VehicleNumber`, `LNO`, `CardNumber`, `Date`, `Amount`, `UserId`, `DateIn`, `TimeIn`, `Year`, `Month`, `Week`, `TP`, `Comments`)

-- MAINTENANCES
INSERT INTO fleet.maintenances (`VehicleNumber`, `RFLNO`, `IncidentAction`, `Details`, `Date`, `Time`, `ReleaseDate`, `ReleaseTime`, `Cost`, `InvoiceNumber`, `Week`, `UserId`, `DateIn`, `TimeIn`)

-- REFUELINGS
INSERT INTO fleet.refuelings (`VehicleNumber`, `RFLNO`, `Date`, `Time`, `Mileage`, `TERNO`, `ReceiptNumber`, `Quantity`, `Amount`, `CardNumber`, `UserId`, `DateIn`, `TimeIn`, `KM`, `Consumption`)
 
-- CAR DOCUMENTS (REGISTER VEHICLES)

