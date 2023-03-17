#pragma once


// boîte de dialogue de CErreurPort

class CErreurPort : public CDialogEx
{
	DECLARE_DYNAMIC(CErreurPort)

public:
	CErreurPort(CWnd* pParent = nullptr);   // constructeur standard
	virtual ~CErreurPort();

// Données de boîte de dialogue
#ifdef AFX_DESIGN_TIME
	enum { IDD = IDD_ERREUR_PORT };
#endif

protected:
	virtual void DoDataExchange(CDataExchange* pDX);    // Prise en charge de DDX/DDV

	DECLARE_MESSAGE_MAP()
public:
	afx_msg void OnBnClickedFermererreurport();
};
