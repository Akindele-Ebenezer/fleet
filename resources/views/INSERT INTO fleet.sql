

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
 
-- USERS
-- CAR DOCUMENTS (REGISTER VEHICLES)

