const sampleProfitLossData = {
    "company": "Chhabria & Sons Private Limited",
    "period": {
        "start": "2025-04-01",
        "end": "2026-03-31"
    },
    "viewType": "monthly", // "monthly" or "outlet"
    "profitLoss": [
        {
            "id": "apr_2025",
            "name": "Apr 2025",
            "tradeExpenses": {
                "openingStock": { value: 0, groups: [] },
                "directExpenses": { value: 0, groups: [] },
                "purchases": { value: 0, groups: [] },
                "total": 0
            },
            "tradeIncome": {
                "sales": { value: 71706846.46, groups: [{ name: "Product Sales", value: 71706846.46 }] },
                "directIncome": { value: 0, groups: [] },
                "closingStock": { value: 71706846.46, groups: [] },
                "total": 71706846.46
            },
            "grossProfit": 40916892.47,
            "grossProfitPercent": 57.06,
            "indirectExpenses": {
                "personnel": { value: 12000000, groups: [{ name: "Salaries", value: 8000000 }, { name: "Benefits", value: 4000000 }] },
                "administrative": { value: 10789539.99, groups: [{ name: "Rent", value: 5000000 }, { name: "Utilities", value: 3789539.99 }, { name: "Office Expenses", value: 2000000 }] },
                "selling": { value: 8000000, groups: [{ name: "Marketing", value: 5000000 }, { name: "Commission", value: 3000000 }] },
                "total": 30789539.99
            },
            "indirectIncome": {
                "otherIncome": { value: 0, groups: [] },
                "total": 0
            },
            "netProfit": 40917304.47,
            "netProfitPercent": 57.06
        },
        {
            "id": "may_2025",
            "name": "May 2025",
            "tradeExpenses": {
                "openingStock": { value: 0, groups: [] },
                "directExpenses": { value: 3920057.10, groups: [{ name: "Freight", value: 2000000 }, { name: "Packaging", value: 1920057.10 }] },
                "purchases": { value: 0, groups: [] },
                "total": 3920057.10
            },
            "tradeIncome": {
                "sales": { value: 12395754.44, groups: [{ name: "Product Sales", value: 12395754.44 }] },
                "directIncome": { value: 0, groups: [] },
                "closingStock": { value: 8475697.30, groups: [] },
                "total": 8475697.30
            },
            "grossProfit": -22187693.66,
            "grossProfitPercent": -178.99,
            "indirectExpenses": {
                "personnel": { value: 12000000, groups: [{ name: "Salaries", value: 8000000 }, { name: "Benefits", value: 4000000 }] },
                "administrative": { value: 10877453.90, groups: [{ name: "Rent", value: 5000000 }, { name: "Utilities", value: 3877453.90 }, { name: "Office Expenses", value: 2000000 }] },
                "selling": { value: 7810000, groups: [{ name: "Marketing", value: 4810000 }, { name: "Commission", value: 3000000 }] },
                "total": 30687453.90
            },
            "indirectIncome": {
                "otherIncome": { value: 21406000, groups: [{ name: "Interest Income", value: 15000000 }, { name: "Rental Income", value: 6406000 }] },
                "total": 21406000
            },
            "netProfit": -22187693.66,
            "netProfitPercent": -178.99
        },
        {
            "id": "jun_2025",
            "name": "Jun 2025",
            "tradeExpenses": {
                "openingStock": { value: 0, groups: [] },
                "directExpenses": { value: 3756993.60, groups: [{ name: "Freight", value: 1900000 }, { name: "Packaging", value: 1856993.60 }] },
                "purchases": { value: 0, groups: [] },
                "total": 3756993.60
            },
            "tradeIncome": {
                "sales": { value: 28006350.00, groups: [{ name: "Product Sales", value: 28006350.00 }] },
                "directIncome": { value: 0, groups: [] },
                "closingStock": { value: 24249356.40, groups: [] },
                "total": 24249356.40
            },
            "grossProfit": 6971506.66,
            "grossProfitPercent": -24.89,
            "indirectExpenses": {
                "personnel": { value: 12000000, groups: [{ name: "Salaries", value: 8000000 }, { name: "Benefits", value: 4000000 }] },
                "administrative": { value: 11633202, groups: [{ name: "Rent", value: 5000000 }, { name: "Utilities", value: 4633202 }, { name: "Office Expenses", value: 2000000 }] },
                "selling": { value: 7000000, groups: [{ name: "Marketing", value: 4000000 }, { name: "Commission", value: 3000000 }] },
                "total": 31633202
            },
            "indirectIncome": {
                "otherIncome": { value: 41445720, groups: [{ name: "Interest Income", value: 30000000 }, { name: "Rental Income", value: 11445720 }] },
                "total": 41445720
            },
            "netProfit": 6971506.66,
            "netProfitPercent": -24.89
        },
        {
            "id": "jul_2025",
            "name": "Jul 2025",
            "tradeExpenses": {
                "openingStock": { value: 0, groups: [] },
                "directExpenses": { value: 3893714.00, groups: [{ name: "Freight", value: 2000000 }, { name: "Packaging", value: 1893714.00 }] },
                "purchases": { value: 0, groups: [] },
                "total": 3893714.00
            },
            "tradeIncome": {
                "sales": { value: 57517972.00, groups: [{ name: "Product Sales", value: 57517972.00 }] },
                "directIncome": { value: 0, groups: [] },
                "closingStock": { value: 53624264.20, groups: [] },
                "total": 53624264.20
            },
            "grossProfit": 18569717.10,
            "grossProfitPercent": 32.29,
            "indirectExpenses": {
                "personnel": { value: 12500000, groups: [{ name: "Salaries", value: 8500000 }, { name: "Benefits", value: 4000000 }] },
                "administrative": { value: 12554547.10, groups: [{ name: "Rent", value: 5500000 }, { name: "Utilities", value: 5054547.10 }, { name: "Office Expenses", value: 2000000 }] },
                "selling": { value: 10000000, groups: [{ name: "Marketing", value: 6000000 }, { name: "Commission", value: 4000000 }] },
                "total": 35054547.10
            },
            "indirectIncome": {
                "otherIncome": { value: 0, groups: [] },
                "total": 0
            },
            "netProfit": 18569717.10,
            "netProfitPercent": 32.29
        },
        {
            "id": "aug_2025",
            "name": "Aug 2025",
            "tradeExpenses": {
                "openingStock": { value: 0, groups: [] },
                "directExpenses": { value: 4140217.20, groups: [{ name: "Freight", value: 2200000 }, { name: "Packaging", value: 1940217.20 }] },
                "purchases": { value: 0, groups: [] },
                "total": 4140217.20
            },
            "tradeIncome": {
                "sales": { value: 15789641.50, groups: [{ name: "Product Sales", value: 15789641.50 }] },
                "directIncome": { value: 0, groups: [] },
                "closingStock": { value: 11649424.30, groups: [] },
                "total": 11649424.30
            },
            "grossProfit": -23045149.20,
            "grossProfitPercent": -145.95,
            "indirectExpenses": {
                "personnel": { value: 12500000, groups: [{ name: "Salaries", value: 8500000 }, { name: "Benefits", value: 4000000 }] },
                "administrative": { value: 11694573.50, groups: [{ name: "Rent", value: 5500000 }, { name: "Utilities", value: 4194573.50 }, { name: "Office Expenses", value: 2000000 }] },
                "selling": { value: 10500000, groups: [{ name: "Marketing", value: 6500000 }, { name: "Commission", value: 4000000 }] },
                "total": 34694573.50
            },
            "indirectIncome": {
                "otherIncome": { value: 0, groups: [] },
                "total": 0
            },
            "netProfit": -23045149.20,
            "netProfitPercent": -145.95
        },
        {
            "id": "sep_2025",
            "name": "Sep 2025",
            "tradeExpenses": {
                "openingStock": { value: 0, groups: [] },
                "directExpenses": { value: 4897930.50, groups: [{ name: "Freight", value: 2500000 }, { name: "Packaging", value: 2397930.50 }] },
                "purchases": { value: 0, groups: [] },
                "total": 4897930.50
            },
            "tradeIncome": {
                "sales": { value: 14547402.70, groups: [{ name: "Product Sales", value: 14547402.70 }] },
                "directIncome": { value: 0, groups: [] },
                "closingStock": { value: 9649472.20, groups: [] },
                "total": 9649472.20
            },
            "grossProfit": -24306568.50,
            "grossProfitPercent": -167.09,
            "indirectExpenses": {
                "personnel": { value: 12500000, groups: [{ name: "Salaries", value: 8500000 }, { name: "Benefits", value: 4000000 }] },
                "administrative": { value: 11095604.70, groups: [{ name: "Rent", value: 5500000 }, { name: "Utilities", value: 3595604.70 }, { name: "Office Expenses", value: 2000000 }] },
                "selling": { value: 10300000, groups: [{ name: "Marketing", value: 6300000 }, { name: "Commission", value: 4000000 }] },
                "total": 33895604.70
            },
            "indirectIncome": {
                "otherIncome": { value: 0, groups: [] },
                "total": 0
            },
            "netProfit": -24306568.50,
            "netProfitPercent": -167.09
        },
        {
            "id": "oct_2025",
            "name": "Oct 2025",
            "tradeExpenses": {
                "openingStock": { value: 0, groups: [] },
                "directExpenses": { value: 4638787.80, groups: [{ name: "Freight", value: 2400000 }, { name: "Packaging", value: 2238787.80 }] },
                "purchases": { value: 0, groups: [] },
                "total": 4638787.80
            },
            "tradeIncome": {
                "sales": { value: 59819747.80, groups: [{ name: "Product Sales", value: 59819747.80 }] },
                "directIncome": { value: 0, groups: [] },
                "closingStock": { value: 55180960.00, groups: [] },
                "total": 55180960.00
            },
            "grossProfit": 20681406.60,
            "grossProfitPercent": 34.57,
            "indirectExpenses": {
                "personnel": { value: 13000000, groups: [{ name: "Salaries", value: 9000000 }, { name: "Benefits", value: 4000000 }] },
                "administrative": { value: 11499553.40, groups: [{ name: "Rent", value: 5500000 }, { name: "Utilities", value: 3999553.40 }, { name: "Office Expenses", value: 2000000 }] },
                "selling": { value: 10000000, groups: [{ name: "Marketing", value: 6000000 }, { name: "Commission", value: 4000000 }] },
                "total": 34499553.40
            },
            "indirectIncome": {
                "otherIncome": { value: 0, groups: [] },
                "total": 0
            },
            "netProfit": 20681406.60,
            "netProfitPercent": 34.57
        },
        {
            "id": "nov_2025",
            "name": "Nov 2025",
            "tradeExpenses": {
                "openingStock": { value: 0, groups: [] },
                "directExpenses": { value: 4699800.90, groups: [{ name: "Freight", value: 2450000 }, { name: "Packaging", value: 2249800.90 }] },
                "purchases": { value: 0, groups: [] },
                "total": 4699800.90
            },
            "tradeIncome": {
                "sales": { value: 18672358.40, groups: [{ name: "Product Sales", value: 18672358.40 }] },
                "directIncome": { value: 0, groups: [] },
                "closingStock": { value: 13972557.50, groups: [] },
                "total": 13972557.50
            },
            "grossProfit": 6578620.00,
            "grossProfitPercent": 35.23,
            "indirectExpenses": {
                "personnel": { value: 13000000, groups: [{ name: "Salaries", value: 9000000 }, { name: "Benefits", value: 4000000 }] },
                "administrative": { value: 10393937.50, groups: [{ name: "Rent", value: 5500000 }, { name: "Utilities", value: 2893937.50 }, { name: "Office Expenses", value: 2000000 }] },
                "selling": { value: 10000000, groups: [{ name: "Marketing", value: 6000000 }, { name: "Commission", value: 4000000 }] },
                "total": 33393937.50
            },
            "indirectIncome": {
                "otherIncome": { value: 0, groups: [] },
                "total": 0
            },
            "netProfit": 6578620.00,
            "netProfitPercent": 35.23
        },
        {
            "id": "dec_2025",
            "name": "Dec 2025",
            "tradeExpenses": {
                "openingStock": { value: 0, groups: [] },
                "directExpenses": { value: 4646763.49, groups: [{ name: "Freight", value: 2400000 }, { name: "Packaging", value: 2246763.49 }] },
                "purchases": { value: 0, groups: [] },
                "total": 4646763.49
            },
            "tradeIncome": {
                "sales": { value: 27765864.30, groups: [{ name: "Product Sales", value: 27765864.30 }] },
                "directIncome": { value: 0, groups: [] },
                "closingStock": { value: 23118229.40, groups: [] },
                "total": 23118229.40
            },
            "grossProfit": 19278173.50,
            "grossProfitPercent": 69.43,
            "indirectExpenses": {
                "personnel": { value: 13000000, groups: [{ name: "Salaries", value: 9000000 }, { name: "Benefits", value: 4000000 }] },
                "administrative": { value: 11840055.90, groups: [{ name: "Rent", value: 5500000 }, { name: "Utilities", value: 4340055.90 }, { name: "Office Expenses", value: 2000000 }] },
                "selling": { value: 11000000, groups: [{ name: "Marketing", value: 7000000 }, { name: "Commission", value: 4000000 }] },
                "total": 35840055.90
            },
            "indirectIncome": {
                "otherIncome": { value: 0, groups: [] },
                "total": 0
            },
            "netProfit": 19278173.50,
            "netProfitPercent": 69.43
        },
        {
            "id": "jan_2026",
            "name": "Jan 2026",
            "tradeExpenses": {
                "openingStock": { value: 0, groups: [] },
                "directExpenses": { value: 4666919.20, groups: [{ name: "Freight", value: 2400000 }, { name: "Packaging", value: 2266919.20 }] },
                "purchases": { value: 0, groups: [] },
                "total": 4666919.20
            },
            "tradeIncome": {
                "sales": { value: 85359152.10, groups: [{ name: "Product Sales", value: 85359152.10 }] },
                "directIncome": { value: 0, groups: [] },
                "closingStock": { value: 80692232.90, groups: [] },
                "total": 80692232.90
            },
            "grossProfit": 78373786.10,
            "grossProfitPercent": 91.82,
            "indirectExpenses": {
                "personnel": { value: 14000000, groups: [{ name: "Salaries", value: 10000000 }, { name: "Benefits", value: 4000000 }] },
                "administrative": { value: 12313516.80, groups: [{ name: "Rent", value: 6000000 }, { name: "Utilities", value: 4313516.80 }, { name: "Office Expenses", value: 2000000 }] },
                "selling": { value: 12000000, groups: [{ name: "Marketing", value: 8000000 }, { name: "Commission", value: 4000000 }] },
                "total": 38313516.80
            },
            "indirectIncome": {
                "otherIncome": { value: 0, groups: [] },
                "total": 0
            },
            "netProfit": 78373786.10,
            "netProfitPercent": 91.82
        }
    ]
};
