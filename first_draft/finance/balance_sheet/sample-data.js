// Sample Balance Sheet data with nested groups and ledgers
const sampleBalanceSheetData = {
    company: "Accrete Globus Technology Pvt Ltd",
    asOnDate: "2026-01-08",
    balancesheet: {
        // Liabilities: Credit is positive
        liabilities: {
            id: "liabilities_root",
            name: "Liabilities",
            type: "group",
            children: [
                {
                    id: "capital_account",
                    name: "Capital Account",
                    type: "group",
                    icon: "account_balance",
                    children: [
                        {
                            id: "share_capital",
                            name: "Share Capital",
                            type: "ledger",
                            debit: 0,
                            credit: 5000000
                        },
                        {
                            id: "retained_earnings",
                            name: "Retained Earnings",
                            type: "ledger",
                            debit: 0,
                            credit: 3250000
                        },
                        {
                            id: "reserves_surplus",
                            name: "Reserves and Surplus",
                            type: "group",
                            children: [
                                {
                                    id: "general_reserve",
                                    name: "General Reserve",
                                    type: "ledger",
                                    debit: 0,
                                    credit: 1500000
                                },
                                {
                                    id: "statutory_reserve",
                                    name: "Statutory Reserve",
                                    type: "ledger",
                                    debit: 0,
                                    credit: 750000
                                }
                            ]
                        }
                    ]
                },
                {
                    id: "current_liabilities",
                    name: "Current Liabilities",
                    type: "group",
                    icon: "description",
                    children: [
                        {
                            id: "sundry_creditors",
                            name: "Sundry Creditors",
                            type: "group",
                            children: [
                                {
                                    id: "trade_creditors",
                                    name: "Trade Creditors",
                                    type: "ledger",
                                    debit: 125000,
                                    credit: 2450000
                                },
                                {
                                    id: "service_providers",
                                    name: "Service Providers",
                                    type: "ledger",
                                    debit: 45000,
                                    credit: 820000
                                }
                            ]
                        },
                        {
                            id: "duties_taxes",
                            name: "Duties and Taxes",
                            type: "group",
                            children: [
                                {
                                    id: "gst_payable",
                                    name: "GST Payable",
                                    type: "ledger",
                                    debit: 28000,
                                    credit: 385000
                                },
                                {
                                    id: "tds_payable",
                                    name: "TDS Payable",
                                    type: "ledger",
                                    debit: 15000,
                                    credit: 125000
                                },
                                {
                                    id: "income_tax_payable",
                                    name: "Income Tax Payable",
                                    type: "ledger",
                                    debit: 0,
                                    credit: 450000
                                }
                            ]
                        },
                        {
                            id: "provisions",
                            name: "Provisions",
                            type: "group",
                            children: [
                                {
                                    id: "provision_gratuity",
                                    name: "Provision for Gratuity",
                                    type: "ledger",
                                    debit: 75000,
                                    credit: 650000
                                },
                                {
                                    id: "provision_bonus",
                                    name: "Provision for Bonus",
                                    type: "ledger",
                                    debit: 35000,
                                    credit: 280000
                                },
                                {
                                    id: "provision_leave_encashment",
                                    name: "Provision for Leave Encashment",
                                    type: "ledger",
                                    debit: 0,
                                    credit: 175000
                                }
                            ]
                        },
                        {
                            id: "other_current_liabilities",
                            name: "Other Current Liabilities",
                            type: "group",
                            children: [
                                {
                                    id: "salary_payable",
                                    name: "Salary Payable",
                                    type: "ledger",
                                    debit: 0,
                                    credit: 925000
                                },
                                {
                                    id: "pf_payable",
                                    name: "PF Payable",
                                    type: "ledger",
                                    debit: 0,
                                    credit: 185000
                                },
                                {
                                    id: "esi_payable",
                                    name: "ESI Payable",
                                    type: "ledger",
                                    debit: 0,
                                    credit: 42000
                                },
                                {
                                    id: "security_deposits",
                                    name: "Security Deposits",
                                    type: "ledger",
                                    debit: 0,
                                    credit: 350000
                                },
                                {
                                    id: "advance_from_customers",
                                    name: "Advance from Customers",
                                    type: "ledger",
                                    debit: 0,
                                    credit: 560000
                                }
                            ]
                        }
                    ]
                },
                {
                    id: "loans_advances",
                    name: "Loans (Liability)",
                    type: "group",
                    icon: "payments",
                    children: [
                        {
                            id: "secured_loans",
                            name: "Secured Loans",
                            type: "group",
                            children: [
                                {
                                    id: "bank_loan_hdfc",
                                    name: "Bank Loan - HDFC",
                                    type: "ledger",
                                    debit: 0,
                                    credit: 3500000
                                },
                                {
                                    id: "vehicle_loan",
                                    name: "Vehicle Loan",
                                    type: "ledger",
                                    debit: 0,
                                    credit: 850000
                                }
                            ]
                        },
                        {
                            id: "unsecured_loans",
                            name: "Unsecured Loans",
                            type: "group",
                            children: [
                                {
                                    id: "directors_loan",
                                    name: "Loan from Directors",
                                    type: "ledger",
                                    debit: 0,
                                    credit: 1200000
                                },
                                {
                                    id: "family_friends_loan",
                                    name: "Loan from Family/Friends",
                                    type: "ledger",
                                    debit: 0,
                                    credit: 500000
                                }
                            ]
                        }
                    ]
                }
            ]
        },
        // Assets: Debit is positive
        assets: {
            id: "assets_root",
            name: "Assets",
            type: "group",
            children: [
                {
                    id: "fixed_assets",
                    name: "Fixed Assets",
                    type: "group",
                    icon: "business",
                    children: [
                        {
                            id: "tangible_assets",
                            name: "Tangible Assets",
                            type: "group",
                            children: [
                                {
                                    id: "land_building",
                                    name: "Land and Building",
                                    type: "ledger",
                                    debit: 5000000,
                                    credit: 0
                                },
                                {
                                    id: "plant_machinery",
                                    name: "Plant and Machinery",
                                    type: "ledger",
                                    debit: 2800000,
                                    credit: 0
                                },
                                {
                                    id: "furniture_fixtures",
                                    name: "Furniture and Fixtures",
                                    type: "ledger",
                                    debit: 450000,
                                    credit: 0
                                },
                                {
                                    id: "computers",
                                    name: "Computers and Laptops",
                                    type: "ledger",
                                    debit: 1250000,
                                    credit: 0
                                },
                                {
                                    id: "vehicles",
                                    name: "Vehicles",
                                    type: "ledger",
                                    debit: 950000,
                                    credit: 0
                                }
                            ]
                        },
                        {
                            id: "intangible_assets",
                            name: "Intangible Assets",
                            type: "group",
                            children: [
                                {
                                    id: "software_licenses",
                                    name: "Software Licenses",
                                    type: "ledger",
                                    debit: 680000,
                                    credit: 0
                                },
                                {
                                    id: "patents_trademarks",
                                    name: "Patents and Trademarks",
                                    type: "ledger",
                                    debit: 350000,
                                    credit: 0
                                },
                                {
                                    id: "goodwill",
                                    name: "Goodwill",
                                    type: "ledger",
                                    debit: 500000,
                                    credit: 0
                                }
                            ]
                        },
                        {
                            id: "depreciation",
                            name: "Less: Accumulated Depreciation",
                            type: "group",
                            children: [
                                {
                                    id: "depreciation_tangible",
                                    name: "Depreciation on Tangible Assets",
                                    type: "ledger",
                                    debit: 0,
                                    credit: 1850000
                                },
                                {
                                    id: "depreciation_intangible",
                                    name: "Amortization on Intangible Assets",
                                    type: "ledger",
                                    debit: 0,
                                    credit: 230000
                                }
                            ]
                        }
                    ]
                },
                {
                    id: "investments",
                    name: "Investments",
                    type: "group",
                    icon: "trending_up",
                    children: [
                        {
                            id: "long_term_investments",
                            name: "Long Term Investments",
                            type: "group",
                            children: [
                                {
                                    id: "equity_shares",
                                    name: "Investment in Equity Shares",
                                    type: "ledger",
                                    debit: 1500000,
                                    credit: 0
                                },
                                {
                                    id: "mutual_funds",
                                    name: "Mutual Funds",
                                    type: "ledger",
                                    debit: 850000,
                                    credit: 0
                                }
                            ]
                        },
                        {
                            id: "short_term_investments",
                            name: "Short Term Investments",
                            type: "group",
                            children: [
                                {
                                    id: "fixed_deposits",
                                    name: "Fixed Deposits",
                                    type: "ledger",
                                    debit: 1200000,
                                    credit: 0
                                },
                                {
                                    id: "liquid_funds",
                                    name: "Liquid Funds",
                                    type: "ledger",
                                    debit: 600000,
                                    credit: 0
                                }
                            ]
                        }
                    ]
                },
                {
                    id: "current_assets",
                    name: "Current Assets",
                    type: "group",
                    icon: "account_balance_wallet",
                    children: [
                        {
                            id: "cash_bank",
                            name: "Cash and Bank Balances",
                            type: "group",
                            children: [
                                {
                                    id: "cash_in_hand",
                                    name: "Cash in Hand",
                                    type: "ledger",
                                    debit: 125000,
                                    credit: 0
                                },
                                {
                                    id: "bank_hdfc",
                                    name: "HDFC Bank Current A/C",
                                    type: "ledger",
                                    debit: 2850000,
                                    credit: 0
                                },
                                {
                                    id: "bank_icici",
                                    name: "ICICI Bank Savings A/C",
                                    type: "ledger",
                                    debit: 1450000,
                                    credit: 0
                                }
                            ]
                        },
                        {
                            id: "sundry_debtors",
                            name: "Sundry Debtors (Receivables)",
                            type: "group",
                            children: [
                                {
                                    id: "trade_debtors",
                                    name: "Trade Debtors",
                                    type: "ledger",
                                    debit: 3450000,
                                    credit: 0
                                },
                                {
                                    id: "provision_bad_debts",
                                    name: "Less: Provision for Bad Debts",
                                    type: "ledger",
                                    debit: 0,
                                    credit: 172500
                                }
                            ]
                        },
                        {
                            id: "inventory",
                            name: "Inventory",
                            type: "group",
                            children: [
                                {
                                    id: "raw_materials",
                                    name: "Raw Materials",
                                    type: "ledger",
                                    debit: 950000,
                                    credit: 0
                                },
                                {
                                    id: "work_in_progress",
                                    name: "Work in Progress",
                                    type: "ledger",
                                    debit: 420000,
                                    credit: 0
                                },
                                {
                                    id: "finished_goods",
                                    name: "Finished Goods",
                                    type: "ledger",
                                    debit: 1650000,
                                    credit: 0
                                }
                            ]
                        },
                        {
                            id: "loans_advances_assets",
                            name: "Loans and Advances",
                            type: "group",
                            children: [
                                {
                                    id: "advance_to_suppliers",
                                    name: "Advance to Suppliers",
                                    type: "ledger",
                                    debit: 380000,
                                    credit: 0
                                },
                                {
                                    id: "advance_to_employees",
                                    name: "Advance to Employees",
                                    type: "ledger",
                                    debit: 85000,
                                    credit: 0
                                },
                                {
                                    id: "prepaid_expenses",
                                    name: "Prepaid Expenses",
                                    type: "ledger",
                                    debit: 145000,
                                    credit: 0
                                },
                                {
                                    id: "security_deposits_paid",
                                    name: "Security Deposits Paid",
                                    type: "ledger",
                                    debit: 250000,
                                    credit: 0
                                }
                            ]
                        },
                        {
                            id: "other_current_assets",
                            name: "Other Current Assets",
                            type: "group",
                            children: [
                                {
                                    id: "gst_input_credit",
                                    name: "GST Input Credit",
                                    type: "ledger",
                                    debit: 325000,
                                    credit: 0
                                },
                                {
                                    id: "tds_receivable",
                                    name: "TDS Receivable",
                                    type: "ledger",
                                    debit: 95000,
                                    credit: 0
                                },
                                {
                                    id: "interest_accrued",
                                    name: "Interest Accrued on Investments",
                                    type: "ledger",
                                    debit: 68000,
                                    credit: 0
                                }
                            ]
                        }
                    ]
                }
            ]
        }
    }
};
