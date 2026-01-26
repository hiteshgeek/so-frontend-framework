// Sample P&L data with new structure
const samplePLData = {
    company: "Accrete Globus Technology Pvt Ltd",
    period: {
        start: "2025-04-01",
        end: "2026-01-08"
    },
    plstatement: {
        // Trade Expense: Opening Stock, Purchase Accounts, Direct Expenses
        trade_expense: {
            id: "trade_expense",
            name: "Trade Expense",
            type: "group",
            children: [
                {
                    id: "opening_stock",
                    name: "Opening Stock",
                    type: "ledger",
                    icon: "inventory_2",
                    debit: 2500000,
                    credit: 0
                },
                {
                    id: "purchase_accounts",
                    name: "Purchase Accounts",
                    type: "group",
                    children: [
                        {
                            id: "local_purchases",
                            name: "Local Purchases",
                            type: "ledger",
                            debit: 5800000,
                            credit: 125000
                        },
                        {
                            id: "interstate_purchases",
                            name: "Interstate Purchases",
                            type: "ledger",
                            debit: 3200000,
                            credit: 85000
                        },
                        {
                            id: "import_purchases",
                            name: "Import Purchases",
                            type: "ledger",
                            debit: 1500000,
                            credit: 0
                        },
                        {
                            id: "purchase_return",
                            name: "Purchase Return",
                            type: "ledger",
                            debit: 0,
                            credit: 250000
                        }
                    ]
                },
                {
                    id: "direct_expenses",
                    name: "Direct Expenses",
                    type: "group",
                    children: [
                        {
                            id: "server_expense",
                            name: "Server Expense",
                            type: "ledger",
                            debit: 3926206,
                            credit: 0
                        },
                        {
                            id: "freight_inward",
                            name: "Freight Inward",
                            type: "ledger",
                            debit: 450000,
                            credit: 0
                        },
                        {
                            id: "customs_duty",
                            name: "Customs Duty",
                            type: "ledger",
                            debit: 280000,
                            credit: 0
                        },
                        {
                            id: "direct_expense_refund",
                            name: "Direct Expense Refund (Abnormal - Cr)",
                            type: "ledger",
                            debit: 50000,
                            credit: 180000
                        }
                    ]
                }
            ]
        },
        // Trade Income: Sales Accounts, Direct Incomes, Closing Stock
        trade_income: {
            id: "trade_income",
            name: "Trade Income",
            type: "group",
            children: [
                {
                    id: "sales_accounts",
                    name: "Sales Accounts",
                    type: "group",
                    children: [
                        {
                            id: "local_sales",
                            name: "Local Sales",
                            type: "ledger",
                            debit: 380000,
                            credit: 12500000
                        },
                        {
                            id: "interstate_sales",
                            name: "Interstate Sales",
                            type: "ledger",
                            debit: 150000,
                            credit: 8200000
                        },
                        {
                            id: "export_sales",
                            name: "Export Sales",
                            type: "ledger",
                            debit: 0,
                            credit: 3500000
                        },
                        {
                            id: "sales_return",
                            name: "Sales Return A/C",
                            type: "ledger",
                            debit: 420000,
                            credit: 0
                        }
                    ]
                },
                {
                    id: "direct_incomes",
                    name: "Direct Incomes",
                    type: "group",
                    children: [
                        {
                            id: "job_work_income",
                            name: "Job Work Income",
                            type: "ledger",
                            debit: 0,
                            credit: 850000
                        },
                        {
                            id: "scrap_sales",
                            name: "Scrap Sales",
                            type: "ledger",
                            debit: 0,
                            credit: 125000
                        },
                        {
                            id: "direct_income_expense",
                            name: "Direct Income Expense (Abnormal - Dr)",
                            type: "ledger",
                            debit: 95000,
                            credit: 30000
                        }
                    ]
                },
                {
                    id: "closing_stock",
                    name: "Closing Stock",
                    type: "ledger",
                    icon: "inventory_2",
                    debit: 0,
                    credit: 3200000
                }
            ]
        },
        // Indirect Expense - All grouped under "Indirect Expenses"
        indirect_expense: {
            id: "indirect_expense_root",
            name: "Indirect Expense",
            type: "group",
            children: [
                {
                    id: "indirect_expenses",
                    name: "Indirect Expenses",
                    type: "group",
                    children: [
                        {
                            id: "admin_charges",
                            name: "Admin Charges",
                            type: "ledger",
                            debit: 16819,
                            credit: 0
                        },
                        {
                            id: "amount_written_off",
                            name: "AMOUNT W/OFF",
                            type: "ledger",
                            debit: 318824,
                            credit: 0
                        },
                        {
                            id: "electricity_expenses",
                            name: "Electricity Expenses",
                            type: "ledger",
                            debit: 299106,
                            credit: 0
                        },
                        {
                            id: "employer_pf_contribution",
                            name: "Employer PF Contribution Expense",
                            type: "ledger",
                            debit: 318824,
                            credit: 0
                        },
                        {
                            id: "extra_charges",
                            name: "Extra Charges",
                            type: "ledger",
                            debit: 14157,
                            credit: 0
                        },
                        {
                            id: "gst_late_fee",
                            name: "GST Late Fee",
                            type: "ledger",
                            debit: 2030,
                            credit: 0
                        },
                        {
                            id: "guest_house_rent",
                            name: "Guest House Rent",
                            type: "ledger",
                            debit: 333165,
                            credit: 0
                        },
                        {
                            id: "ineligible_tax",
                            name: "Ineligible Tax",
                            type: "ledger",
                            debit: 3567,
                            credit: 0
                        },
                        {
                            id: "input_round_off",
                            name: "Input Round Off A/C",
                            type: "ledger",
                            debit: 1,
                            credit: 0
                        },
                        {
                            id: "interest_tds_payable",
                            name: "Interest On TDS Payable",
                            type: "ledger",
                            debit: 8183,
                            credit: 0
                        },
                        {
                            id: "legal_professional",
                            name: "Legal And Professional Expenses",
                            type: "ledger",
                            debit: 863451,
                            credit: 0
                        },
                        {
                            id: "office_expenses_blr",
                            name: "Office Expenses BLR",
                            type: "ledger",
                            debit: 186037,
                            credit: 0
                        },
                        {
                            id: "office_expenses_delhi",
                            name: "Office Expenses Delhi",
                            type: "ledger",
                            debit: 59009,
                            credit: 0
                        },
                        {
                            id: "office_maintenance",
                            name: "Office Maintenance Charges",
                            type: "ledger",
                            debit: 143824,
                            credit: 0
                        },
                        {
                            id: "office_rent",
                            name: "Office Rent",
                            type: "ledger",
                            debit: 3178424,
                            credit: 0
                        },
                        {
                            id: "output_round_off",
                            name: "Output Round Off A/C",
                            type: "ledger",
                            debit: 0,
                            credit: 1
                        },
                        {
                            id: "pantry_food",
                            name: "Pantry & Food Supplies Expense",
                            type: "ledger",
                            debit: 206902,
                            credit: 0
                        },
                        {
                            id: "professional_charges",
                            name: "PROFESSIONAL CHARGES",
                            type: "ledger",
                            debit: 129796,
                            credit: 0
                        },
                        {
                            id: "security_charges",
                            name: "Security Charges",
                            type: "ledger",
                            debit: 10000,
                            credit: 0
                        },
                        {
                            id: "software_expense",
                            name: "Software Expense",
                            type: "ledger",
                            debit: 607264,
                            credit: 0
                        },
                        {
                            id: "expense_recovery",
                            name: "Expense Recovery (Abnormal - Cr)",
                            type: "ledger",
                            debit: 120000,
                            credit: 350000
                        },
                        {
                            id: "financial_expenses",
                            name: "Financial Expenses",
                            type: "group",
                            children: [
                                {
                                    id: "forex_gain_loss",
                                    name: "Forex Gain and Loss",
                                    type: "ledger",
                                    debit: 9537,
                                    credit: 0
                                }
                            ]
                        },
                        {
                            id: "travel_lodging",
                            name: "Travel & Lodging Expenses",
                            type: "group",
                            children: [
                                {
                                    id: "flight_expense",
                                    name: "Flight Expense",
                                    type: "ledger",
                                    debit: 183314,
                                    credit: 0
                                },
                                {
                                    id: "hotel_expense",
                                    name: "Hotel Expense",
                                    type: "ledger",
                                    debit: 118610,
                                    credit: 0
                                },
                                {
                                    id: "travel_expenses",
                                    name: "Travel Expenses",
                                    type: "ledger",
                                    debit: 250627,
                                    credit: 0
                                }
                            ]
                        },
                        {
                            id: "communication_expense",
                            name: "Communication Expense",
                            type: "group",
                            children: [
                                {
                                    id: "internet_act_blr",
                                    name: "Internet Expense - ACT BLR",
                                    type: "ledger",
                                    debit: 21233,
                                    credit: 0
                                },
                                {
                                    id: "internet_act_delhi",
                                    name: "Internet Expense - ACT DELHI",
                                    type: "ledger",
                                    debit: 6719,
                                    credit: 0
                                },
                                {
                                    id: "internet_airtel",
                                    name: "Internet Expense - AIRTEL",
                                    type: "ledger",
                                    debit: 8995,
                                    credit: 0
                                },
                                {
                                    id: "mobile_idea",
                                    name: "Mobile Expense - IDEA CELLULAR",
                                    type: "ledger",
                                    debit: 76232,
                                    credit: 0
                                }
                            ]
                        },
                        {
                            id: "salary_expense",
                            name: "Salary Expense Group",
                            type: "group",
                            children: [
                                {
                                    id: "conveyance_allowance",
                                    name: "Conveyance Allowance",
                                    type: "ledger",
                                    debit: 222918,
                                    credit: 0
                                },
                                {
                                    id: "house_rent_allowance",
                                    name: "House Rent Allowance",
                                    type: "ledger",
                                    debit: 2841644,
                                    credit: 0
                                },
                                {
                                    id: "medical_allowance",
                                    name: "Medical Allowance",
                                    type: "ledger",
                                    debit: 319202,
                                    credit: 0
                                },
                                {
                                    id: "salary_expense_ledger",
                                    name: "Salary Expense",
                                    type: "ledger",
                                    debit: 9147676,
                                    credit: 0
                                },
                                {
                                    id: "special_allowance",
                                    name: "Special Allowance",
                                    type: "ledger",
                                    debit: 4907640,
                                    credit: 0
                                }
                            ]
                        }
                    ]
                }
            ]
        },
        // Indirect Income - Notice Buyout Income as a ledger under Indirect Incomes group
        indirect_income: {
            id: "indirect_income_root",
            name: "Indirect Income",
            type: "group",
            children: [
                {
                    id: "indirect_incomes",
                    name: "Indirect Incomes",
                    type: "group",
                    children: [
                        {
                            id: "notice_buyout",
                            name: "Notice Buyout Income",
                            type: "ledger",
                            debit: 0,
                            credit: 62852
                        }
                    ]
                }
            ]
        }
    }
};
