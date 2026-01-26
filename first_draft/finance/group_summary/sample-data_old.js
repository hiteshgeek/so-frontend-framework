// Sample Group Summary data with nested groups and ledgers
const sampleGroupSummaryData = {
    company: "Accrete Globus Technology Pvt Ltd",
    groupName: "Current Assets",
    period: {
        start: "2025-04-01",
        end: "2026-01-09"
    },
    groupSummary: {
        id: "current_assets_root",
        name: "Current Assets",
        type: "group",
        children: [
            // Groups always come first
            {
                id: "bank_accounts",
                name: "Bank Accounts",
                type: "group",
                icon: "account_balance",
                children: [
                    {
                        id: "hdfc_bank",
                        name: "HDFC Bank Current A/C",
                        type: "ledger",
                        openingDr: 2850000,
                        openingCr: 0,
                        debit: 7051606.17,
                        credit: 7025406.17,
                        closingDr: 2876200,
                        closingCr: 0
                    },
                    {
                        id: "icici_bank",
                        name: "ICICI Bank Savings A/C",
                        type: "ledger",
                        openingDr: 1450000,
                        openingCr: 0,
                        debit: 4500000,
                        credit: 4200000,
                        closingDr: 1750000,
                        closingCr: 0
                    },
                    {
                        id: "axis_bank",
                        name: "Axis Bank Current A/C",
                        type: "ledger",
                        openingDr: 850000,
                        openingCr: 0,
                        debit: 2300000,
                        credit: 2100000,
                        closingDr: 1050000,
                        closingCr: 0
                    }
                ]
            },
            {
                id: "deposits_asset",
                name: "Deposits (Asset)",
                type: "group",
                icon: "savings",
                children: [
                    {
                        id: "fd_hdfc",
                        name: "Fixed Deposit - HDFC",
                        type: "ledger",
                        openingDr: 5000000,
                        openingCr: 0,
                        debit: 0,
                        credit: 0,
                        closingDr: 5000000,
                        closingCr: 0
                    },
                    {
                        id: "fd_icici",
                        name: "Fixed Deposit - ICICI",
                        type: "ledger",
                        openingDr: 10000000,
                        openingCr: 0,
                        debit: 0,
                        credit: 0,
                        closingDr: 10000000,
                        closingCr: 0
                    }
                ]
            },
            {
                id: "loans_advances_asset",
                name: "Loans & Advances (Asset)",
                type: "group",
                icon: "payments",
                children: [
                    {
                        id: "staff_advances",
                        name: "Staff Advances",
                        type: "ledger",
                        openingDr: 85000,
                        openingCr: 0,
                        debit: 150000,
                        credit: 120000,
                        closingDr: 115000,
                        closingCr: 0
                    },
                    {
                        id: "vendor_advances",
                        name: "Advance to Suppliers",
                        type: "ledger",
                        openingDr: 380000,
                        openingCr: 0,
                        debit: 520000,
                        credit: 450000,
                        closingDr: 450000,
                        closingCr: 0
                    },
                    {
                        id: "security_deposits_paid",
                        name: "Security Deposits Paid",
                        type: "ledger",
                        openingDr: 250000,
                        openingCr: 0,
                        debit: 50000,
                        credit: 0,
                        closingDr: 300000,
                        closingCr: 0
                    },
                    {
                        id: "prepaid_expenses",
                        name: "Prepaid Expenses",
                        type: "ledger",
                        openingDr: 145000,
                        openingCr: 0,
                        debit: 280000,
                        credit: 250000,
                        closingDr: 175000,
                        closingCr: 0
                    }
                ]
            },
            {
                id: "sundry_debtors",
                name: "Sundry Debtors (Receivables)",
                type: "group",
                icon: "request_quote",
                children: [
                    {
                        id: "trade_debtors",
                        name: "Trade Debtors",
                        type: "group",
                        children: [
                            {
                                id: "major_clients_debtors",
                                name: "Major Client Receivables",
                                type: "ledger",
                                openingDr: 2500000,
                                openingCr: 0,
                                debit: 5183078.02,
                                credit: 4509378.02,
                                closingDr: 3173700,
                                closingCr: 0
                            },
                            {
                                id: "regular_clients_debtors",
                                name: "Regular Client Receivables",
                                type: "ledger",
                                openingDr: 950000,
                                openingCr: 0,
                                debit: 1850000,
                                credit: 1650000,
                                closingDr: 1150000,
                                closingCr: 0
                            }
                        ]
                    },
                    {
                        id: "provision_bad_debts",
                        name: "Less: Provision for Bad Debts",
                        type: "ledger",
                        openingDr: 0,
                        openingCr: 172500,
                        debit: 0,
                        credit: 50000,
                        closingDr: 0,
                        closingCr: 222500
                    }
                ]
            },
            {
                id: "inventory",
                name: "Inventory",
                type: "group",
                icon: "inventory_2",
                children: [
                    {
                        id: "raw_materials",
                        name: "Raw Materials",
                        type: "ledger",
                        openingDr: 950000,
                        openingCr: 0,
                        debit: 2800000,
                        credit: 2650000,
                        closingDr: 1100000,
                        closingCr: 0
                    },
                    {
                        id: "work_in_progress",
                        name: "Work in Progress",
                        type: "ledger",
                        openingDr: 420000,
                        openingCr: 0,
                        debit: 850000,
                        credit: 780000,
                        closingDr: 490000,
                        closingCr: 0
                    },
                    {
                        id: "finished_goods",
                        name: "Finished Goods",
                        type: "ledger",
                        openingDr: 1650000,
                        openingCr: 0,
                        debit: 3200000,
                        credit: 3100000,
                        closingDr: 1750000,
                        closingCr: 0
                    }
                ]
            },
            {
                id: "other_current_assets",
                name: "Other Current Assets",
                type: "group",
                icon: "account_balance_wallet",
                children: [
                    {
                        id: "gst_input_credit",
                        name: "GST Input Credit",
                        type: "ledger",
                        openingDr: 325000,
                        openingCr: 0,
                        debit: 685000,
                        credit: 650000,
                        closingDr: 360000,
                        closingCr: 0
                    },
                    {
                        id: "tds_receivable",
                        name: "TDS Receivable",
                        type: "ledger",
                        openingDr: 95000,
                        openingCr: 0,
                        debit: 180000,
                        credit: 160000,
                        closingDr: 115000,
                        closingCr: 0
                    },
                    {
                        id: "interest_accrued",
                        name: "Interest Accrued on Investments",
                        type: "ledger",
                        openingDr: 68000,
                        openingCr: 0,
                        debit: 85000,
                        credit: 0,
                        closingDr: 153000,
                        closingCr: 0
                    },
                    {
                        id: "income_tax_refundable",
                        name: "Income Tax Refundable",
                        type: "ledger",
                        openingDr: 450000,
                        openingCr: 0,
                        debit: 0,
                        credit: 450000,
                        closingDr: 0,
                        closingCr: 0
                    }
                ]
            },
            {
                id: "cash_in_hand",
                name: "Cash in Hand",
                type: "group",
                icon: "payments",
                children: [
                    {
                        id: "petty_cash",
                        name: "Petty Cash",
                        type: "ledger",
                        openingDr: 25000,
                        openingCr: 0,
                        debit: 150000,
                        credit: 145000,
                        closingDr: 30000,
                        closingCr: 0
                    },
                    {
                        id: "cash_office",
                        name: "Cash at Office",
                        type: "ledger",
                        openingDr: 100000,
                        openingCr: 0,
                        debit: 520000,
                        credit: 485000,
                        closingDr: 135000,
                        closingCr: 0
                    }
                ]
            },
            // Direct ledgers at root level (after all groups)
            {
                id: "marketable_securities",
                name: "Marketable Securities",
                type: "ledger",
                openingDr: 8500000,
                openingCr: 0,
                debit: 2000000,
                credit: 1500000,
                closingDr: 9000000,
                closingCr: 0
            },
            {
                id: "short_term_investments",
                name: "Short-Term Investments",
                type: "ledger",
                openingDr: 3200000,
                openingCr: 0,
                debit: 1000000,
                credit: 800000,
                closingDr: 3400000,
                closingCr: 0
            },
            {
                id: "unbilled_revenue",
                name: "Unbilled Revenue",
                type: "ledger",
                openingDr: 1250000,
                openingCr: 0,
                debit: 2500000,
                credit: 2200000,
                closingDr: 1550000,
                closingCr: 0
            },
            {
                id: "other_receivables",
                name: "Other Receivables",
                type: "ledger",
                openingDr: 485000,
                openingCr: 0,
                debit: 920000,
                credit: 850000,
                closingDr: 555000,
                closingCr: 0
            },
            {
                id: "accrued_income",
                name: "Accrued Income",
                type: "ledger",
                openingDr: 275000,
                openingCr: 0,
                debit: 450000,
                credit: 380000,
                closingDr: 345000,
                closingCr: 0
            },
            {
                id: "employee_advances",
                name: "Employee Advances",
                type: "ledger",
                openingDr: 125000,
                openingCr: 0,
                debit: 250000,
                credit: 230000,
                closingDr: 145000,
                closingCr: 0
            },
            {
                id: "inter_company_receivables",
                name: "Inter-Company Receivables",
                type: "ledger",
                openingDr: 950000,
                openingCr: 0,
                debit: 1500000,
                credit: 1300000,
                closingDr: 1150000,
                closingCr: 0
            },
            {
                id: "misc_current_assets",
                name: "Miscellaneous Current Assets",
                type: "ledger",
                openingDr: 185000,
                openingCr: 0,
                debit: 320000,
                credit: 290000,
                closingDr: 215000,
                closingCr: 0
            },
            {
                id: "export_incentive_receivable",
                name: "Export Incentive Receivable",
                type: "ledger",
                openingDr: 425000,
                openingCr: 0,
                debit: 350000,
                credit: 200000,
                closingDr: 575000,
                closingCr: 0
            },
            {
                id: "claims_receivable",
                name: "Claims Receivable",
                type: "ledger",
                openingDr: 320000,
                openingCr: 0,
                debit: 180000,
                credit: 120000,
                closingDr: 380000,
                closingCr: 0
            }
        ]
    }
};
