#pragma once


// boîte de dialogue de CErreur

class CErreur : public CDialogEx
{
	DECLARE_DYNAMIC(CErreur)

public:
	CErreur(CWnd* pParent = nullptr);   // constructeur standard
	virtual ~CErreur();

// Données de boîte de dialogue
#ifdef AFX_DESIGN_TIME
	enum { IDD = IDD_ERREUR };
#endif

protected:
	virtual void DoDataExchange(CDataExchange* pDX);    // Prise en charge de DDX/DDV

	DECLARE_MESSAGE_MAP()
public:
	afx_msg void OnBnClickedRelance();
	CStatic m_ErreurModif;
	afx_msg void OnStnClickedStaticErreurmodif();
};
